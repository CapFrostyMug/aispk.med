<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformationForAdmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('information_for_admission')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $count = 1000;

        for ($i = 1; $i <= $count; $i++) {
            $data[] = [
                'student_id' => fake()->numberBetween(1, 500),
                'faculty_id' => fake()->numberBetween(1, 10),
                'financing_type_id' => fake()->numberBetween(1, 3),
                'is_original_docs' => fake()->numberBetween(0, 1),
            ];
        }

        return $data;
    }
}
