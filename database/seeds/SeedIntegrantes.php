<?php

use Illuminate\Database\Seeder;

class SeedIntegrantes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Integrantes')->insert([
            'nombre' => "Rosaura García Muñoz",
            'descripcion' => "Presidenta de Resguardo Rosa",
            'foto' => 'public/user.png',
        ]);
    }
}
