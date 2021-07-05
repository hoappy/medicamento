<?php

namespace Database\Seeders;

use App\Models\Asigna_valor;
use App\Models\Cliente;
use App\Models\Medicamento;
use App\Models\Reporte;
use App\Models\Carga;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        Medicamento::factory(50)->create();
        Reporte::factory(5)->create();
        Cliente::factory(200)->create();
        Asigna_valor::factory(200)->create();
        Carga::factory(200)->create();
    }
}
