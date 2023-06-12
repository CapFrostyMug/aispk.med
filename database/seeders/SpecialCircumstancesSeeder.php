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
                'name' => 'Потребность в общежитии'
            ],
            [
                'name' => 'Наличие инвалидности'
            ],
            [
                'name' => 'Абитуриент является сиротой'
            ],
            [
                'name' => 'Абитуриент является иностранцем'
            ],
            [
                'name' => 'Абитуриент нуждается в создании специальных условий при проведении вступительных испытаний'
            ],
        ];

        return $data;
    }
}
