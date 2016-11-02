<?php

use Illuminate\Database\Seeder;

class SeedSecciones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Secciones')->insert([
            'titulo' => "Educacion",
            'descripcion' => "Esta es la seccion de educacion",
        ]);

        DB::table('Secciones')->insert([
            'titulo' => "Salud y nutricion",
            'descripcion' => "Esta es la seccion de salud y nutricion",
        ]);
    }
}
