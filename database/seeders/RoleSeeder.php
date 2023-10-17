<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role =   Role::create(['name' => 'Super Administrador']);
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Autor']);
        Role::create(['name' => 'Lector']);
   

        $role->permissions()->attach(Permission::get()->pluck('id')->toArray());
    }
}
