<?php

use Illuminate\Database\Seeder;

class SeedAvisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Avisos')->insert([
            'titulo' => "Recolecta",
            'descripcion' => "Es una recolecta",
            'foto' => 'cat.jpg',
        ]);
        DB::table('Avisos')->insert([
            'titulo' => "Cambio de politicas",
            'descripcion' => "Es otro anuncio",
            'foto' => 'algo.jpg',
        ]);
        DB::table('Avisos')->insert([
            'titulo' => "Algun anuncio",
            'descripcion' => "Uno mas",
            'foto' => 'xd.png',
        ]);
    }
}
