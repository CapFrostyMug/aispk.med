<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enrollment')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $count = 500;

        for ($i = 1; $i <= $count; $i++) {
            $data[] = [
                'student_id' => fake()->numberBetween(1, 500),
                'faculty_id' => fake()->numberBetween(1, 10),
                'decree_id' => fake()->numberBetween(1, 6),
                'is_pickup_docs' => fake()->boolean(),
            ];
        }

        return $data;
    }
}
