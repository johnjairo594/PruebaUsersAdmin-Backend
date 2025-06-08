<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cargos = Cargo::whereIn('codigo', ['car001', 'car002', 'car003', 'car004', 'car005'])->get();
        $departamentos = Departamento::whereIn('codigo', ['dep001', 'dep002', 'dep003'])->get();

        DB::table('users')->insert([
            [
                'usuario' => 'jnolan',
                'primerNombre' => 'John',
                'segundoNombre' => 'Armstrong',
                'primerApellido' => 'Nolan',
                'segundoApellido' => 'Smith',
                'idDepartamento' => $departamentos->where('codigo', 'dep001')->first()->id ?? null,
                'idCargo' => $cargos->where('codigo', 'car001')->first()->id ?? null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'usuario' => 'wwhite',
                'primerNombre' => 'Walter',
                'segundoNombre' => 'William',
                'primerApellido' => 'White',
                'segundoApellido' => 'Johnson',
                'idDepartamento' => $departamentos->where('codigo', 'dep002')->first()->id ?? null,
                'idCargo' => $cargos->where('codigo', 'car002')->first()->id ?? null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'usuario' => 'ngrayson',
                'primerNombre' => 'Nolan',
                'segundoNombre' => 'Omniman',
                'primerApellido' => 'Grayson',
                'segundoApellido' => 'Hereira',
                'idDepartamento' => $departamentos->where('codigo', 'dep003')->first()->id ?? null,
                'idCargo' => $cargos->where('codigo', 'car003')->first()->id ?? null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'usuario' => 'jvera',
                'primerNombre' => 'John',
                'segundoNombre' => 'Jairo',
                'primerApellido' => 'Vera',
                'segundoApellido' => 'Pérez',
                'idDepartamento' => $departamentos->where('codigo', 'dep001')->first()->id ?? null, 
                'idCargo' => $cargos->where('codigo', 'car004')->first()->id ?? null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'usuario' => 'lgomez',
                'primerNombre' => 'Luis',
                'segundoNombre' => 'Martín',
                'primerApellido' => 'Gómez',
                'segundoApellido' => 'Sierra',
                'idDepartamento' => $departamentos->where('codigo', 'dep002')->first()->id ?? null,
                'idCargo' => $cargos->where('codigo', 'car005')->first()->id ?? null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]
        ]);
    }
}
