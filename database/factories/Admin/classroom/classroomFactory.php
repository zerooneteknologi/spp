<?php

namespace Database\Factories\Admin\classroom;

use App\Models\admin\classroom\classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<classroom>
 */
class classroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_id' => $this->faker->numberBetween(1, 5), // Assuming you have 10 schools in your database
            'name' => $this->faker->word(),
            'level' => $this->faker->numberBetween(1, 12),
        ];
    }
}
