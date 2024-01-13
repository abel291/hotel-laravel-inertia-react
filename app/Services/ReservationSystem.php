<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Mail\ReservationOrder;
use App\Models\Discount;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ReservationSystem
{
    public static function check_availability(string $start_date, string $end_date, int $adults, int $kids)
    {


        $start_date = Carbon::createFromFormat('Y-m-d', $start_date);
        $end_date = Carbon::createFromFormat('Y-m-d', $end_date);
        $night = $start_date->diffInDays($end_date);
        $rooms = Room::where('active', 1)
            ->where('adults', '>=', $adults)
            ->where('kids', '>=', $kids)
            ->with(['reservations' => function ($query)  use ($start_date, $end_date) {

                $query->where('state', 'successful');

                $query->where(function ($q) use ($start_date, $end_date) {

                    $q->whereBetween('start_date', [$start_date, $end_date])
                        ->orWhereBetween('end_date', [$start_date, $end_date]);
                });
                $query->orWhere(function ($q) use ($start_date, $end_date) {

                    $q->where('start_date', '<=', $start_date)
                        ->where('end_date', '>=', $end_date);
                });
            }])
            ->with(['complements' => function ($query) {
                $query->where('active', 1);
                $query->where('type_price', '!=', 'free');
            }])
            ->get()
            ->filter(function ($value, $key) {

                return $value->quantity > $value->reservations->sum('room_quantity');
            })
            ->transform(function ($item, $key) use ($night) {

                $item->price_per_total_night = $item->price * $night;

                $room_quantity_availables = $item->quantity - $item->reservations->sum('room_quantity');

                $room_quantity_availables_with_price = [];

                for ($i = 0; $i < $room_quantity_availables; $i++) {
                    array_push($room_quantity_availables_with_price, $item->price_per_total_night * ($i + 1));
                }

                $item->quantity_availables = $room_quantity_availables_with_price;

                $item->complements->transform(function ($complement, $key) use ($night) {

                    if ($complement->type_price == 'night') {

                        $complement->price_per_total_night = $complement->price * $night;
                    } elseif ($complement->type_price == 'reservation') {

                        $complement->price_per_total_night = $complement->price;
                    }
                    return $complement;
                });

                return $item;
            });

        if ($rooms->isEmpty()) {
            abort(422, 'no hay disponibildad para esas fechas');
        }

        return [
            $rooms->values(),
            $night
        ];
    }
    public static function price_calculation(object $room, int $room_quantity, $ids_complements_cheked = [], $code_dicount = '0')
    {

        $total_price = 0;
        $price_per_reservation = 0;
        $price_per_complements = 0;
        $complements_cheked = [];

        //valido si la cantidad selecionada es mayor a la disponible
        if ($room_quantity > count($room->quantity_availables)) {
            abort(422, "Canctidad selecionada no disponibles");
        }

        $price_per_reservation = $room->quantity_availables[$room_quantity - 1]; //

        if ($ids_complements_cheked) {

            $complements_cheked = $room->complements->whereIn('id', $ids_complements_cheked);

            foreach ($complements_cheked as $key => $complement) {

                $complement->total_price = $complement->price_per_total_night * $room_quantity;
            }

            $price_per_complements = $complements_cheked->sum('total_price');
        }

        $sub_total_price = round($price_per_reservation + $price_per_complements, 2);

        $total_price = $sub_total_price;


        //chekeo si hay codigo de descuento
        $discount = null;
        if ($code_dicount) {

            $discount = Discount::where('code', $code_dicount)->withCount('reservations')->first();

            if ($discount->quantity <= $discount->reservations_count) {
                abort(422, 'Este codigo de descuento ya no esta disponible.');
            }
            if (!$discount) {
                abort(422, 'Este codigo de descuento ya no esta disponible.');
            }

            $discount->amount = round($sub_total_price * ($discount->percent / 100), 2);

            $total_price = round($sub_total_price - $discount->amount, 2);

            $discount = $discount->only('code', 'amount', 'percent');
        }

        return [
            $sub_total_price,
            $total_price,
            $complements_cheked,
            $price_per_reservation,
            $discount
        ];
    }

    public function check_payment($reservation, $client, $room, $methodpayment, $ids_complements_cheked)
    {

        try {

            DB::beginTransaction();
            $room->complements_cheked = $room->complements->whereIn('id', $ids_complements_cheked);
            if ($room->complements_cheked) {
                $room->complements_cheked->transform(function ($item, $key) {

                    return $item->only(['name', 'price', 'type_price', 'total_price', 'price_per_total_night']);
                });
            }
            $client->save();
            $reservation->client()->associate($client->id);
            $reservation->room()->associate($room->id);
            $reservation->room_reservation = $room->only(['name', 'beds', 'adults', 'price', 'complements_cheked']);

            $reservation->order = rand(1, 9) . $reservation->start_date->format('md') . $client->id;
            $reservation->save();

            $error = '';

            $description_stripe = $client->name . " - " . $room->name . " - " . $reservation->night . ' noche(s)';
            $payment = $client->charge($reservation->total_price * 100, $methodpayment, [
                'description' => $description_stripe
            ]);

            $client->stripe_id = $payment->id;
            $client->save();

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();

            $error = 'Al parecer hubo un error! El pago a través de su targeta no se pudo realizar.';
            return ['', $error];
        }

        // Mail::to($client->email)->queue(new ReservationOrder($reservation, 'order'));

        return [$reservation, $error];
    }
}
