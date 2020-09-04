<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'name' => 'tias widiatmika',
                'employee_type_id' => 1,
                'nip' => '199105082017121001',
            ],
        ];
        
        foreach ($employees as $employee) {
            DB::table('employees')->insert([
                'employee_type_id' => $employee['employee_type_id'],
                'name' => $employee['name'],
                'nip' => $employee['nip'],
            ]);
        }
    }
}
