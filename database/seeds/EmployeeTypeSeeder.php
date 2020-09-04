<?php

use Illuminate\Database\Seeder;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'calon jft',
            'jft muda',
            'pi',
            'umum',
        ];

        foreach ($types as $type) {
            DB::table('employee_types')->insert([
                'employee_type' => $type,
            ]);
        }
        
    }
}
