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
                'circumstances' => 'Потребность в общежитии'
            ],
            [
                'circumstances' => 'Наличие инвалидности'
            ],
            [
                'circumstances' => 'Абитуриент является сиротой'
            ],
            [
                'circumstances' => 'Абитуриент является иностранцем'
            ],
            [
                'circumstances' => 'Абитуриент нуждается в создании специальных условий при проведении вступительных испытаний'
            ],
        ];

        return $data;
    }
}
