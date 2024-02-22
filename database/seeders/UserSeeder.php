<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::factory(10)->create();

        User::truncate();
        Role::truncate();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'client']);

        $user = User::factory()->create([
            'email' => 'admin@admin.com',
        ]);
        $user->assignRole('admin');

        $user = User::factory()->create([
            'email' => 'client@client.com',
        ]);
        $user->assignRole('client');

        $countUser = config('app.env') == 'testing' ? 10 : 100;


        User::factory()->count($countUser)

            ->state(function (array $attributes) {
                $date = Carbon::parse(fake()->dateTimeBetween('-12 month', 'now'));
                return [
                    'created_at' => $date->format('Y-m-d H:i:s'),
                    'updated_at' => $date->format('Y-m-d H:i:s')
                ];
            })
            ->create()
            ->each(function (User $user) {
                $user->assignRole('client');
            });;
        $users = [];
        // for ($i = 0; $i < $countUser; $i++) {
        //
        //     $user = User::factory()->count($countUser)->create([
        //         'created_at' => $date->format('Y-m-d H:i:s'),
        //         'updated_at' => $date->format('Y-m-d H:i:s')
        //     ])->toArray();

        //     $users[$i] = $user;
        //     dd($users);
        // }
        // $users = User::insert($users);

        // foreach ($users as $key => $user) {
        //     $user->assignRole('client');
        // }
    }
}
