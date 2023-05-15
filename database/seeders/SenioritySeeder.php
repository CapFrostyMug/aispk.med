<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SenioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seniority')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $count = 20;

        for ($i = 1; $i <= $count; $i++) {
            $data[] = [
                'student_id' => fake()->numberBetween(1, 20),
                'place_work' => fake()->company(),
                'profession' => fake()->jobTitle(),
                'years' => fake()->year(),
                'months' => fake()->month(),
            ];
        }

        return $data;
    }
}
