<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Skill;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat data company
        $company = Company::create(['name' => 'Tech Corp']);

        // Buat data employee
        $employee1 = Employee::create(['name' => 'Alice', 'company_id' => $company->id]);
        $employee2 = Employee::create(['name' => 'Bob', 'company_id' => $company->id]);

        // Buat data skill
        $php = Skill::create(['name' => 'PHP']);
        $laravel = Skill::create(['name' => 'Laravel']);
        $vue = Skill::create(['name' => 'Vue.js']);

        // Hubungkan employee ke skill (many to many)
        $employee1->skills()->attach([$php->id, $laravel->id]);
        $employee2->skills()->attach([$laravel->id, $vue->id]);
    }
}
