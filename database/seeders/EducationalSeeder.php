<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('educational')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $count = 500;

        for ($i = 1; $i <= $count; $i++) {
            $data[] = [
                'student_id' => fake()->numberBetween(1, 500),
                'ed_institution_type_id' => fake()->numberBetween(1, 4),
                'ed_doc_type_id' => fake()->numberBetween(1, 5),
                'ed_doc_number' => fake()->randomNumber(7, true),
                'ed_institution_name' => fake()->catchPhrase(),
                'is_first_spo' => fake()->boolean(),
                'is_excellent_student' => fake()->boolean(),
                'avg_rating' => fake()->randomFloat(2, 1, 5),
                'issue_date' => fake()->date(),
            ];
        }

        return $data;
    }
}
