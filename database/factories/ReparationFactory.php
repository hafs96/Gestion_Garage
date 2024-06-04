<?php

namespace Database\Factories;

use App\Models\Reparation;
use App\Models\Vehicule;
use App\Models\Mecanique;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReparationFactory extends Factory
{
    protected $model = Reparation::class;

    public function definition()
    {
        return [
            'vehicule_id' => Vehicule::factory(),
            'mecanique_id' => Mecanique::factory(),
            'status' => $this->faker->randomElement(['en_attente', 'en_cours', 'terminee']),
            'description' => $this->faker->paragraph,
            'date_debut' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'date_fin' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
