<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' =>'Seccion Dashboard']);
        Permission::create(['name' =>'Ver Estadistica']);

        Permission::create(['name' =>'Leer Categoria']);
        Permission::create(['name' =>'Crear Categoria']);
        Permission::create(['name' =>'Editar Categoria']);
        Permission::create(['name' =>'Eliminar Categoria']);

        Permission::create(['name' =>'Leer Producto']);
        Permission::create(['name' =>'Crear Producto']);
        Permission::create(['name' =>'Editar Producto']);
        Permission::create(['name' =>'Eliminar Producto']);

        Permission::create(['name' =>'Leer Tag']);
        Permission::create(['name' =>'Crear Tag']);
        Permission::create(['name' =>'Editar Tag']);
        Permission::create(['name' =>'Eliminar Tag']);

        Permission::create(['name' =>'Leer Usuario']);
        Permission::create(['name' =>'Crear Usuario']);
        Permission::create(['name' =>'Editar Usuario']);
        Permission::create(['name' =>'Eliminar Usuario']);
        
    
    }
}
