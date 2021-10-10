<?php

namespace Database\Factories;

use App\Models\Day;
use Illuminate\Database\Eloquent\Factories\Factory;

class DayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Day::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('-1 months'),
            'goal_weight' => $this->faker->numberBetween(60, 120),
            'morning_weight' => $this->faker->numberBetween(60, 120),
            'allowed_food_intake' => $this->faker->numberBetween(100, 1000),
            'like' => $this->faker->boolean(),
            'created_at' => now()
        ];
    }
}
