<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::truncate();
        $services = [
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
        foreach ($services as $key => $service_name) {
            Service::factory()->create([
                'name' => $service_name,
                'icon' => '/img/complements/complement_' . Str::slug($service_name) . '.png',
            ]);
        }
    }
}
