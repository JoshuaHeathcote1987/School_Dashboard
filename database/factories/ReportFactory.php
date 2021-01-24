<?php

namespace Database\Factories;

use App\Models\Report;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'subject_id' => Subject::factory(),
            'body' => $this->faker->word,
        ];
    }
}
