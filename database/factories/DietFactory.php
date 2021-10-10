<?php

namespace Database\Factories;

use App\Models\Diet;
use Illuminate\Database\Eloquent\Factories\Factory;

class DietFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'diet_name' => $this->faker->name(),
            'start_weight' => $this->faker->numberBetween(65, 160),
            'desired_weight' => $this->faker->numberBetween(55, 85),
            'number_of_days' => $this->faker->numberBetween(80, 300),
            'height' => $this->faker->numberBetween(150, 200),
            'created_at' => $this->faker->dateTimeBetween('-1 months')
        ];
    }
}
