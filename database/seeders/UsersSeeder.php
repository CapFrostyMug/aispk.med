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
                'name' => 'Николай',
                'surname' => 'Яргин',
                'email' => 'nickolas7159@gmail.com',
                'password' => '$2y$10$1TVM0vbkw4RjE2TZfMblLOqSd2/25zypbpuIxgsU68f0ZA9Nj2GKi',
                'is_admin' => 1,
            ],
        ];
    }
}
