<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TraineeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'PID' => $this->faker->numberBetween($min = 100000000, $max = 999999999),
            'first_name' => $this->faker->firstName(),
            'father_name' => $this->faker->firstName(),
            'grand_name' => $this->faker->firstName(),
            'family_name' => $this->faker->lastName(),
            'full_name' => $this->faker->name(),
            'birth_date' => $this->faker->dateTimeBetween($startDate = '-50 years', $endDate = '-15 years', $timezone = null), // DateTime('2003-03-15 02:00:49', 'Africa/Lagos')
            'city' => $this->faker->city(),
            'street' => $this->faker->address(),
            'mobile1' => $this->faker->phoneNumber(),
            'mobile2' => $this->faker->phoneNumber(),

        ];
    }
}


