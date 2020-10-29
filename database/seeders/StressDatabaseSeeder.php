<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StressDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DevUsersTableSeeder::class);
        $this->call(StressWorkersSeeder::class);
    }
}
