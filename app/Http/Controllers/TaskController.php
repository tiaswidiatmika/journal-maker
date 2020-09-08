<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Employee;
use App\EmployeeType;
use App\Role;

// use Nesbotak\Carbon
class TaskController extends Controller
{
    private function getFillingSchema($totalPoint, $point = 1)
    {
        $daysInYear = 365 + Carbon::now()->format('L'); // 366 if leap year
        $workingDays = 6;
        $offDays = 2;
        $daysInWeek = $workingDays = $offDays; // should be 8 days a week
        $weeksInYear = floor($daysInYear / $daysInWeek); // should be 45 weeks a year
        $workingDaysInYear = ($weeksInYear * $workingDays) + ($daysInYear % $daysInWeek); // should be 276 working days a year without national holidays

        $remainingDays = $daysInYear - Carbon::now()->format('z'); // get remaining days
        $interval = floor( $daysInYear / $totalPoint ); // get interval
        $interval = $interval < 1 ? 1 : $interval; // handle interval less than 1
        $point = $totalPoint / $remainingDays; // get general point per role
        $point = $point < 1 ? ceil($point) : floor($point); // ceil up if point less than 1, floor down if point more than 1
        return (object) compact('interval', 'point');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now();
        $shift = 'morning';
        $roles = [
            'A' => [
                'last_date' => Carbon::create(2020, 9, 1, 0),
                'its_point' => 38000,
                'remaining_point' => 38000,
            ],
            'B' => [
                'last_date' => Carbon::create(2020, 9, 1, 0),
                'its_point' => 12,
                'remaining_point' => 12,
            ],
            'C' => [
                'last_date' => null,
                'its_point' => 6,
                'remaining_point' => 6,
            ],
        ];

        $interval = 0;

        // iterate roles to check the filling schedule
        foreach ($roles as $role) {

            /**
             * Probably should do a recursion to get the optimal interval
             * of the journal filling schedule, start by 1 point perfilling
             */
            $schema = $this->getFillingSchema($role['its_point']);
            $interval = $schema->interval;
            $pointsPerFill = $schema->point;

            // check minimum day to make an entry
            // $interval = floor(12/$role['its_point']*30);

            // check if last date is already set
            if ($role['last_date'] == null) {
                $dayDiff = 100;
            } else {
                $dayDiff = $role['last_date']->diffInDays($today);
            }

            if ($shift !== 'off' && $dayDiff >= $interval && $role['remaining_point'] > 0) {
                $pointsPerFill = ($role['remaining_point'] - $pointsPerFill) < 0 ? $role['remaining_point'] : $pointsPerFill;
                echo "perlu diinsert dengan point sebanyak {$pointsPerFill} dengan interval {$interval} hari </br>";
            } else {
                echo 'ndak perlu diinsert </br>';
            }

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        // $employee = Employee::all();
        // return $employee;
        // $uri =
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::with(['employeeType', 'employeeType.roles', 'employeeType.roles.entries'])->find($id);
        foreach ($employee->employeeType->roles as $role) {
            $role->random_entry = $role->entries->random();
        }
        return compact('employee');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
