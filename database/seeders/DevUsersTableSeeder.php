<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DevUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Edward Delgado',
            'email' => 'admin@dredward.site',
            'password' => \Hash::make('tUgxsc9Nqm4IwO3W'),
        ]);

        User::factory()
            ->times(15)
            ->create();
    }
}
