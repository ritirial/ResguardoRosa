<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Resguardo",
            'email' => "usuario@resguardo.com",
            'password' => bcrypt('secret'),
        ]);
    }
}
