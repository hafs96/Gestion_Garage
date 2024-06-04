<?php

namespace Database\Factories;

use App\Models\Facture;
use App\Models\Reparation;
use Illuminate\Database\Eloquent\Factories\Factory;

class FactureFactory extends Factory
{
    protected $model = Facture::class;

    public function definition()
    {
        return [
            'reparation_id' => Reparation::factory(),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'total_amount' => $this->faker->randomFloat(2, 100, 10000),
        ];
    }
}
