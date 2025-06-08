<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'usuario' => 'admin',
                'primerNombre' => 'Admin',
                'segundoNombre' => 'User',
                'primerApellido' => 'System',
                'segundoApellido' => 'Administrator',
                'idDepartamento' => null,
                'idCargo' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]
        ]);
    }
}
