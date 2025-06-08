<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAdminId = DB::table('users')->where('usuario', 'admin')->value('id');

        DB::table('departamentos')->insert([
            [
                'codigo' => 'dep001',
                'nombre' => 'Recursos Humanos',
                'activo' => true,
                'idUsuarioCreacion' => $userAdminId,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'codigo' => 'dep002',
                'nombre' => 'Tecnología de la Información',
                'activo' => true,
                'idUsuarioCreacion' => $userAdminId,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'codigo' => 'dep003',
                'nombre' => 'Marketing y Ventas',
                'activo' => true,
                'idUsuarioCreacion' => $userAdminId,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ]
        ]);
    }
}
