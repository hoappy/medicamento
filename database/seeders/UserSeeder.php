<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Rodrigo Andres Garcia Trautmann',
            'email' => 'hoappy.py@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'direccion' => 'esta es una direccion',
            'telefono' => 989046342,
            'coordenadas' => 'esta es una coordenada',
            'fecha_ingreso' => Carbon::now(),
            'fecha_activacion' => Carbon::now(),
            'estado' => '1',
        ]);

        $user2 = User::create([
            'name' => 'Farmacia Prueba',
            'email' => '123@123.123',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'direccion' => 'esta es una direccion',
            'telefono' => 989046342,
            'coordenadas' => 'esta es una coordenada',
            'fecha_ingreso' => Carbon::now(),
            'fecha_activacion' => Carbon::now(),
            'estado' => '1',
        ]);

        $user->roles()->sync('1');
        $user2->roles()->sync('2');

        User::factory(20)->create();
    }
}
