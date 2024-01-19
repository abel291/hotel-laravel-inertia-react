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
            'Limpieza en seco',
            'Wi-Fi de alta velocidad',
            'Gimnasio general pago',
            'Aire acondicionado',
            'Soporte 24 horas al día, 7 días a la semana',
            'Almacenamiento de equipaje',
            'Cocina compartida',
            'Ducha en la habitación',
            'Alquiler de vehículos',
            'Bar-Cafetería',
            'Conserjería',
            'Consigna de equipajes',
            'Desayuno bufet',
            'Parking cubierto',
            'Se admiten perros y gatos tranquilos',
            'Servicio de banquetes y celebraciones',
            'Salones para eventos',
            'Restaurante',
            'Prensa en zonas comunes',
            'Teléfono',
            'Escritorio',
            'TV LCD',
        ];
        foreach ($amenities as $key => $amenity_name) {
            Amenity::factory()->create([
                'name' => $amenity_name,
                'icon' => '/img/complements/complement_' . Str::slug($amenity_name) . '.png',
            ]);
        }
    }
}
