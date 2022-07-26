<?php

namespace Database\Seeders;

use App\Models\Trainee;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Department::factory(10)->create();
        Student::factory(10000)->create();

    }
}
