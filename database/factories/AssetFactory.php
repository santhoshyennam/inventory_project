<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Asset;
use App\Models\Person;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Asset::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'value' => $this->faker->randomFloat(2, 1000, 100000),
            'purchased' => $this->faker->date('Y-m-d', '-1 year'),
            'person_id' => function () {
                return \App\Models\Person::inRandomOrder()->first()->id;
            },
        ];
    }
}
