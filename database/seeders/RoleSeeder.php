<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Farmacia']);

        Permission::create(['name' => 'admin.farmacia'])->assignRole($role2);
        Permission::create(['name' => 'admin.admin'])->assignRole($role1);

        Permission::create(['name' => 'admin.cargar_medicamento'])->assignRole($role1);
        Permission::create(['name' => 'admin.asignar_role'])->assignRole($role1);
        Permission::create(['name' => 'admin.asignar_valor'])->assignRole($role2);
        Permission::create(['name' => 'admin.reporte'])->syncRoles([$role1, $role2]);

        //Permission::create(['name' => 'nombre del permiso'])->syncRoles([$role1, $role2, $role3]);
        //Permission::create(['name' => 'nombre del permiso'])->assignRole($role1);

    }
}
