@section('title', $labelPlural)

<x-slot name="header">
    <div class="flex justify-between items-end">
        <div>
            <x-breadcrumb :data="[
                [
                    'path' => route('dashboard.rooms.index'),
                    'name' => $label,
                ],
                [
                    'path' => null,
                    'name' => 'Detalles',
                ],
            ]" />
            <x-header-title class="mt-2">
                {{ $label }} : #{{ $reservation->code }}
            </x-header-title>
        </div>

        <div class="table-button-option flex items-center gap-x-2 text-sm">
            <x-lucide-paperclip class="w-4 h-4" />

            <a href="#!"> Descargar pdf</a>
        </div>
    </div>
</x-slot>
<x-content>
    <section>
        <header>
            <x-title>Detalles de la reservacion</x-title>
        </header>
        <dl
            class="divide-y divide-neutral-200 dark:divide-white/10 mt-4 border-t border-neutral-100 dark:border-white/10">
            <x-descripction-list title="Codigo" :description="'#' . $reservation->code" />
            <x-descripction-list title="Fechas de llegada" :description="$reservation->start_date->isoFormat('DD MMM YYYY')" />
            <x-descripction-list title="Fechas de salida" :description="$reservation->end_date->isoFormat('DD MMM YYYY')" />
            <x-descripction-list title="Noches" :description="$reservation->nights" />
            <x-descripction-list title="Habitacion" :description="$reservation->data->room->name" />
            <x-descripction-list title="Camas">
                <x-slot:description>
                    @foreach ($reservation->data->room->beds as $bed)
                        <div class="flex items-center">
                            <div class='flex items-center whitespace-nowrap'>
                                <img src={{ $bed->icon }} class='w-6 h-6 mr-2 text-primary-800' />
                                <span class='text-sm'>{{ $bed->pivot->quantity }} {{ $bed->name }}</span>
                            </div>
                        </div>
                    @endforeach
                </x-slot:description>
            </x-descripction-list>

            <x-descripction-list title="Adultos" :description="$reservation->adults" />

            @if ($reservation->kids)
                <x-descripction-list title="Niños" :description="$reservation->kids" />
            @endif

        </dl>
    </section>
    <section class="mt-10">
        <header>
            <x-title>Informacion de huesped</x-title>
        </header>
        <dl
            class="divide-y divide-neutral-200 dark:divide-white/10 mt-4 border-t border-neutral-100 dark:border-white/10">
            <x-descripction-list title="Nombre" :description="$reservation->data->user->name" />
            <x-descripction-list title="Email" :description="$reservation->data->user->email" />
            <x-descripction-list title="Telefono" :description="$reservation->data->user->phone" />
            <x-descripction-list title="Pais" :description="$reservation->data->user->country" />
            <x-descripction-list title="Ciudad" :description="$reservation->data->user->city" />
        </dl>
    </section>

    <section class="mt-10">
        <header>
            <x-title>Detalles de pago</x-title>
        </header>

        <dl
            class="divide-y divide-neutral-200 dark:divide-white/10 mt-4 border-t border-neutral-100 dark:border-white/10">
            <x-descripction-list title="Estado">
                <x-slot:description>
                    <x-badge :color="$reservation->state->color()">{{ $reservation->state->text() }}</x-badge>
                </x-slot:description>
            </x-descripction-list>
            <x-descripction-list title="Precio por noche">
                <x-slot:description>
                    @money($reservation->price)
                </x-slot:description>
            </x-descripction-list>
            <x-descripction-list title="Sub total">
                <x-slot:description>
                    @money($reservation->sub_total)
                </x-slot:description>
            </x-descripction-list>
            @if ($reservation->offer)
                <x-descripction-list title="Oferta  (-{{ $reservation->offer->percent }}%)">
                    <x-slot:description>
                        <span class="text-red-500">-@money($reservation->offer->offerAmount)</span>
                    </x-slot:description>
                </x-descripction-list>
            @endif

            <x-descripction-list title="IVA ({{ $reservation->tax_percent }}%)">
                <x-slot:description>
                    @money($reservation->tax_amount)
                </x-slot:description>
            </x-descripction-list>
            <x-descripction-list>
                <x-slot:title>
                    <span class="text-base font-bold">Total</span>
                </x-slot:title>
                <x-slot:description>
                    <span class="font-bold text-base">@money($reservation->total)</span>
                </x-slot:description>

            </x-descripction-list>


        </dl>
    </section>

</x-content>
