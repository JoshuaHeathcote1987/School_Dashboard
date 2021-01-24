<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigit,
            'user_id_sender' => $this->faker->randomDigit,
            'head' => $this->faker->word,
            'body' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];
    }
}
