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
            'nombre' => "Angeles",
            'descripcion' => "Activo socialmente",
            'foto' => 'public/cat.jpg',
        ]);
        DB::table('Integrantes')->insert([
            'nombre' => "Pedro",
            'descripcion' => "Educador",
            'foto' => 'public/something.jpg',
        ]);
        DB::table('Integrantes')->insert([
            'nombre' => "Juan",
            'descripcion' => "Amigo de los niños",
            'foto' => 'public/dog.jpg',
        ]);
    }
}
