<?php

namespace Database\Seeders;

use App\Models\admin\School\School;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            SchoolSeeder::class,
            AcademicYearSeeder::class,
            ClassroomSeeder::class,
        ]);

        $schoolId = School::query()->value('id');

        $user = User::query()->firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
            ]
        );

        if (!$schoolId) {
            $school = School::query()->create([
                'name' => 'Sekolah Demo',
                'email' => $user->email,
                'status' => 'active',
            ]);
            $schoolId = $school->id;
        }

        $user->forceFill(['name' => 'Test User'])->save();
        $user->forceFill(['school_id' => $schoolId])->save();
    }
}
