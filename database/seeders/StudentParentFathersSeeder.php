<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentParentFathersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_parent_fathers')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $count = 20;

        for ($i = 1; $i <= $count; $i++) {
            $data[] = [
                'student_id' => fake()->numberBetween(1, 20),
                'name' => fake()->firstName('male'),
                'surname' => fake()->lastName(),
                'patronymic' => fake()->firstNameMale(),
                'phone' => fake()->e164PhoneNumber(),
            ];
        }

        return $data;
    }
}
