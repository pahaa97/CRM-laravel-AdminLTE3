<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->text,
            'employees' => $this->faker->numberBetween(1,1000),
            'user_id' => 1,
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
