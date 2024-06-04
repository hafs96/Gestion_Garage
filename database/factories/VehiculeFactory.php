<?php
namespace Database\Factories;

use App\Models\Client;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculeFactory extends Factory
{
    protected $model = Vehicule::class;

    public function definition()
    {
        return [
            'client_id' => Client::factory(),
            'brand' => $this->faker->company,
            'model' => $this->faker->word,
            'fuel_type' => $this->faker->randomElement(['Essence', 'Diesel', 'Electrique', 'Hybride']),
            'registration_number' => $this->faker->unique()->bothify('??-###-??'),
            'photo' => $this->faker->imageUrl(640, 480, 'transport', true, 'car'),
        ];
    }
}
