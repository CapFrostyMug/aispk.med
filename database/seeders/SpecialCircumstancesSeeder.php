<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialCircumstancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('special_circumstances')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [
            [
                'name' => 'Общежитие',
                'text' => 'Потребность в общежитии'
            ],
            [
                'name' => 'Инвалидность',
                'text' => 'Наличие инвалидности'
            ],
            [
                'name' => 'Сирота',
                'text' => 'Абитуриент является сиротой'
            ],
            [
                'name' => 'Иностранец',
                'text' => 'Абитуриент является иностранцем'
            ],
            [
                'name' => 'Специальные условия',
                'text' => 'Абитуриент нуждается в создании специальных условий при проведении вступительных испытаний'
            ],
        ];

        return $data;
    }
}
