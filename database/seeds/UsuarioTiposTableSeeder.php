<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Str;

class UsuarioTiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuario')->insert(['nombre' => 'Administrador']);
        DB::table('tipo_usuario')->insert(['nombre' => 'Usuario' ]);
    }
}
