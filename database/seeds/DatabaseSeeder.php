<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    	$this->call(SeedSecciones::class);
    	$this->call(SeedActividades::class);
        $this->call(SeedFotosActividades::class);
        $this->call(SeedAvisos::class);
        $this->call(SeedIntegrantes::class);
    }
}
