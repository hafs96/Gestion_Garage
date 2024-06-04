<?php
namespace Database\Factories;

use App\Models\Mecanique;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MecaniqueFactory extends Factory
{
    protected $model = Mecanique::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->create(['role' => 'mecanicien'])->id,
            'specialisation' => $this->faker->word,
        ];
    }
}
