<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grade::class;

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
            'grade' => $this->faker->randomDigit(),
            'percentage' => $this->faker->randomDigit(),
        ];
    }
}
