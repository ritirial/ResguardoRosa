<?php

use Illuminate\Database\Seeder;

class SeedActividades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Actividades')->insert([
            'titulo' => "Ingles",
            'descripcion' => "Esta es la pagina de ingles",
            'seccion' => 1,
        ]);

        DB::table('Actividades')->insert([
            'titulo' => "Matematicas",
            'descripcion' => "Esta es la pagina de matematicas",
            'seccion' => 1,
        ]);

        DB::table('Actividades')->insert([
            'titulo' => "Taller de orientacion nutricional",
            'descripcion' => "Este es un taller de orientacion nutricional",
            'seccion' => 2,
        ]);

        DB::table('Actividades')->insert([
            'titulo' => "Faramacia viva",
            'descripcion' => "Una farmacia viva",
            'seccion' => 2,
        ]);
    }
}
