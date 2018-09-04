<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(EntrustTableSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(StatesSeeder::class);
    }
}
