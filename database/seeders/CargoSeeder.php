<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAdminId = User::where('usuario', 'admin')->value('id');
        DB::table('cargos')->insert([
            [
                'codigo' => 'car001',
                'nombre' => 'Cocinero',
                'activo' => true,
                'idUsuarioCreacion' => $userAdminId,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'codigo' => 'car002',
                'nombre' => 'Asistente de Marketing',
                'activo' => true,
                'idUsuarioCreacion' => $userAdminId,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'codigo' => 'car003',
                'nombre' => 'Gerente de Ventas',
                'activo' => true,
                'idUsuarioCreacion' => $userAdminId,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'codigo' => 'car004',
                'nombre' => 'Desarrollador Backend',
                'activo' => true,
                'idUsuarioCreacion' => $userAdminId,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            [
                'codigo' => 'car005',
                'nombre' => 'Desarrollador Frontend',
                'activo' => true,
                'idUsuarioCreacion' => $userAdminId,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ]
        ]);
    }
}
