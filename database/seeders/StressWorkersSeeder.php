<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Worker;

class StressWorkersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '-1');

        $faker = \Faker\Factory::create();
        $date = now()->toDateTimeString();
        $data = [];
        
        for ($i=0; $i < 5000000; $i++) { 
            $data[] = [
                'firstName' => "Fake:",
                'lastName' => "".$i,
                'birthday' => $date,
                'email' => "Fake_".$i."@dredward.site",
                'phone' => mt_rand(1000000000,9999999999),
                'hiredDate' => $date,
                'banckAccountNumber' => bin2hex(random_bytes(15)),
                'salary' => mt_rand(1,9999999).".".mt_rand(0,99),
                'created_at' => $date,
                'updated_at' => $date,
            ];
        }

        $chunks = array_chunk($data, 5000);

        foreach ($chunks as $chunk) {
            Worker::insert($chunk);
        }
    }
}
