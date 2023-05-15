<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        /**
         * Таблицы категорий
         */
        $this->call(LanguagesSeeder::class);
        $this->call(NationalitySeeder::class);
        $this->call(EducationalInstitutionTypesSeeder::class);
        $this->call(EducationalDocTypesSeeder::class);
        $this->call(FinancingTypesSeeder::class);
        $this->call(FacultiesSeeder::class);
        $this->call(DecreesSeeder::class);
        $this->call(SpecialCircumstancesSeeder::class);

        /**
         * Главная и второстепенные таблицы
         */
        $this->call(PassportsSeeder::class);
        $this->call(StudentsSeeder::class);

        $this->call(EducationalSeeder::class);
        $this->call(SenioritySeeder::class);
        $this->call(StudentParentFathersSeeder::class);
        $this->call(StudentParentMothersSeeder::class);
        $this->call(EnrollmentSeeder::class);

        /**
         * Сводные таблицы
         */
        $this->call(InformationForAdmissionSeeder::class);
        $this->call(StudentSpecialCircumstanceSeeder::class);
    }
}
