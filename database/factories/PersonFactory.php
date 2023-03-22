<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Person;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Person::class;

    public function definition(): array
    {
        return [
            'first_name' =>  $this->faker->firstName,
            'last_name' =>  $this->faker->lastName,
            'date_of_birth' =>  $this->faker->date('Y-m-d', '-18 years'),
            'email' =>   $this->faker->unique()->safeEmail,
        ];
    }
}
