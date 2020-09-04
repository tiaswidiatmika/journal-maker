<?php

use Illuminate\Database\Seeder;

class JournalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // use this if want to seed more than one users
        $users = [
            'tias' => [
                'employee_id' => 1,
                'period' => 2020
            ],
        ];

        // but today, just one user with id 1
        $employeeId = 1;
        // besok lanjut lagi


    }
}
