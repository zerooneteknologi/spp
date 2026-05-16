<?php

namespace Database\Factories\Admin\AcademicYear;

use App\Models\admin\AcademicYear\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AcademicYear>
 */
class AcademicYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startYear = $this->faker->numberBetween(2020, 2030);
        return [
            'school_id' => \App\Models\admin\School\School::factory(),
            'name' => $startYear . '/' . ($startYear + 1),
            'start_year' => $startYear,
            'end_year' => $startYear + 1,
            'is_active' => $this->faker->boolean(20), // 20% kemungkinan aktif
        ];
    }
}
