<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $reservation_date = fake()->dateTimeInInterval('-5 month', '+5 month');

        $start_date = $reservation_date;
        $night = rand(2, 8);
        $end_date = $reservation_date->modify('+' . $night . ' day');

        return [
            'code' => fake()->bothify('?#?#?#?#'),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'night' => $night,
            'special_request' => fake()->sentence(),
            'adults' => rand(1, 3),
        ];
    }
}
