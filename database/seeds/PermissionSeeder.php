<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Cap de Departament']);
        Role::create(['name' => 'Tutor de Grup']);
        Role::create(['name' => 'Professor']);


        //Permission::create(['name' => 'edit articles']);





    }
}
