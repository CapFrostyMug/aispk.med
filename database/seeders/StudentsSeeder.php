<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $count = 20;

        for ($i = 1; $i <= $count; $i++) {
            $data[] = [
                'name' => fake()->firstName(),
                'surname' => fake()->lastName(),
                'patronymic' => fake()->firstNameMale(),
                'passport_id' => fake()->numberBetween(1, 20),
                'phone' => fake()->e164PhoneNumber(),
                'email' => fake()->email(),
                'language_id' => fake()->numberBetween(1, 5),
                'about_me' => fake()->text(100),
            ];
        }

        return $data;
    }
}
