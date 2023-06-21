<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PassportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('passports')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $count = 500;

        for ($i = 1; $i <= $count; $i++) {
            $data[] = [
                'birthday' => fake()->date(),
                'birthplace' => fake()->address(),
                'number' => fake()->randomNumber(9, true),
                'gender' => fake()->title(),
                'nationality_id' => fake()->numberBetween(1, 14),
                'issue_by' => fake()->address(),
                'issue_date' => fake()->date(),
                'address_registered' => fake()->address(),
                'address_residential' => fake()->address(),
            ];
        }

        return $data;
    }
}
