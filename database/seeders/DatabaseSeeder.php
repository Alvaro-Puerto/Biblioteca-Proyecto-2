<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\Recurso;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Categoria::factory(10)->create();

        $permisos = Permission::all();

        foreach ($permisos as $permiso) {
            $permiso->delete();
        }
        
        Permission::create(['name' => 'administrar dashboard']);
        Permission::create(['name' => 'administrar prestamo']);
        Permission::create(['name' => 'administrar recursos']);
        Permission::create(['name' => 'administrar categoria']);
        Permission::create(['name' => 'administrar editorial']);
        Permission::create(['name' => 'administrar author']);
        Permission::create(['name' => 'administrar usuario-menu']);
        Permission::create(['name' => 'administrar admin-system']);
        Permission::create(['name' => 'administrar admin-permisos']);


        $user_admin = User::create([
            'name' => 'admin',
            'email' => 'admin@localhost.com',
            'password' => bcrypt('admin'),
        ]);

        $user_bibliotecario = User::create([
            'name' => 'bibliotecario',
            'email' => 'biblotecario@localhost.com',
            'password' => bcrypt('bibliotecario'),
        ]);

        Recurso::create([
                'titulo' => 'El principito',
                'autor_id' =>  1,
                'editorial_id' => 1,
                'categoria_id' => 1,
                'inventario' => 10,
                'descripcion' => 'El principito es un cuento poético que viene acompañado de ilustraciones hechas con acuarelas por el mismo Saint-Exupéry. En él, un piloto se encuentra perdido en el desierto del Sahara después de que su avión sufriera una avería, pero para su sorpresa, es allí donde conoce a un pequeño príncipe proveniente de otro planeta. La historia tiene una temática filosófica, donde se incluyen críticas sociales dirigidas a la extrañeza con la que los adultos ven las cosas y a la pérdida de la infancia.',
            ]);

        $user_admin->permissions()->attach(Permission::all());
       
    }
}
