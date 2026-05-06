<?php

namespace Database\Seeders;

use App\Models\admin\School\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::factory()->count(5)->create();
    }
}
