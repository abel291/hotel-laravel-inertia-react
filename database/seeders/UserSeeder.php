<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::factory(100)->create();
        User::factory()->create([
            'name' => '123123',
            'email' => 'test@test.com',
            'phone' => '123123123',
            'password' => Hash::make('123123')
        ]);
    }
}
