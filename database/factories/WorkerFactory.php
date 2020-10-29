<?php

namespace Database\Factories;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class WorkerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Worker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->name,
            'lastName' => $this->faker->lastName,
            'birthday' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->isbn10,
            'hiredDate' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'banckAccountNumber' => $this->faker->bankAccountNumber,
            'salary' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 9999999),
        ];
    }
}
