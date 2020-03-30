<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
