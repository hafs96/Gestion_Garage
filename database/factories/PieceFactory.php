<?php

namespace Database\Factories;

use App\Models\Piece;
use Illuminate\Database\Eloquent\Factories\Factory;

class PieceFactory extends Factory
{
    protected $model = Piece::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'reference' => $this->faker->unique()->bothify('???-###'),
            'fournisseur' => $this->faker->company,
            'prix' => $this->faker->randomFloat(2, 10, 1000),
            'quantite' => $this->faker->numberBetween(1, 100),
            'seuil' => 10,
        ];
    }
}
