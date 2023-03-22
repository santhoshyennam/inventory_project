<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asset;
use App\Models\Person;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 persons
        $persons = Person::factory()->count(10)->create();

        // Create 50 assets, randomly assigning each asset to one of the persons created above
        Asset::factory()->count(50)->create([
            'person_id' => $persons->random()->id,
        ]);
    }
}
