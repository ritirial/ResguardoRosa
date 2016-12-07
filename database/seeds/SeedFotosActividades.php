<?php

use Illuminate\Database\Seeder;

class SeedFotosActividades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('FotosActividades')->insert([
            'ruta' => 'public/something.jpg',
            'actividad' => 3,
        ]);
    }
}
