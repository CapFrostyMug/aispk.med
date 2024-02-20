<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }

    private function getData(): array
    {
        return [
            [
                'name' => 'Bruce',
                'surname' => 'Wayne',
                'email' => 'example@mail.com',
                'password' => '$2y$10$b4BBJK7LL6.pBDiheZG5lewynyt1lUFcU0ROjIsoGrNPv31dbsvJ2',
                'is_admin' => 1,
            ],
        ];
    }
}
