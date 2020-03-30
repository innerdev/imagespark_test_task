<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->insert([
            'id' => 1,
            'name' => "Moscow",
        ]);

        DB::table('cities')->insert([
            'id' => 2,
            'name' => "Saint-Petersburg",
        ]);

        DB::table('users')->insert([
            'id' => 1,
            'first_name' => "Vasya",
            'middle_name' => "Vasilievich",
            'last_name' => "Ivanov",
            'city_id' => 1,
            'email' => 'user@email.test',
            'password' => 'any'
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'first_name' => "Oleg",
            'middle_name' => "Olegovich",
            'last_name' => "Petrov",
            'city_id' => 2,
            'email' => 'user2@email.test',
            'password' => 'any'
        ]);
    }
}
