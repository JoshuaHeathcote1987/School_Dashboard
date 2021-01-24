<?php

namespace Database\Factories;

use App\Models\Injury;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InjuryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Injury::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'description' => $this->faker->word,
        ];
    }
}
