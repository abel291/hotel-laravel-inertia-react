<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Amenity::truncate();
        $amenities = [
            [
                'name' => 'Wi-Fi',
                'icon' => 'wifi.png'
            ],
            [
                'name' => 'Gimnasio general pago',
                'icon' => 'dumbbell.png'
            ],
            [
                'name' => 'Aire acondicionado',
                'icon' => 'air-vent.png'
            ],
            [
                'name' => 'Soporte 24 horas al',
                'icon' => 'user-round-cog.png'
            ],
            [
                'name' => 'Almacenamiento de equipaje',
                'icon' => 'baggage-claim.png'
            ],
            [
                'name' => 'Cocina compartida',
                'icon' => 'utensils.png'
            ],
            [
                'name' => 'Ducha en la habitación',
                'icon' => 'shower-head.png'
            ],
            [
                'name' => 'Alquiler de vehículos',
                'icon' => 'car.png'
            ],
            [
                'name' => 'Bar-Cafetería',
                'icon' => 'wine.png'
            ],
            [
                'name' => 'Piscinas paras niños',
                'icon' => 'baby.png'
            ],
            [
                'name' => 'Consigna de equipajes',
                'icon' => 'baggage-claim.png'
            ],
            [
                'name' => 'Desayuno bufet',
                'icon' => 'chef-hat.png'
            ],
            [
                'name' => 'Parking cubierto',
                'icon' => 'parking-circle.png'
            ],
            [
                'name' => 'Se admiten perros y gatos',
                'icon' => 'dog.png'
            ],
            [
                'name' => 'Servicio para celebraciones',
                'icon' => 'cake.png'
            ],
            [
                'name' => 'Salones para eventos',
                'icon' => 'calendar-check-2.png'
            ],
            [
                'name' => 'Restaurante',
                'icon' => 'cooking-pot.png'
            ],
            [
                'name' => 'Prensa en zonas comunes',
                'icon' => 'newspaper.png'
            ],
            [
                'name' => 'Teléfono',
                'icon' => 'phone.png'
            ],
            [
                'name' => 'Escritorio',
                'icon' => 'lamp-desk.png'
            ],
            [
                'name' => 'TV LCD',
                'icon' => 'tv.png'
            ],
        ];
        foreach ($amenities as $key => $amenity) {
            Amenity::factory()->create([
                'name' => $amenity['name'],
                'icon' => '/img/amenities/' . $amenity['icon'],
            ]);
        }
    }
}
