<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

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

        // get interval
        $interval = floor($daysInYear / ($totalPoint / $point));
        $daysToCompletePoint = $interval < 1 ? 0 : floor($daysInYear / $interval);
        if ($interval < 1 || $daysToCompletePoint > $workingDaysInYear) {
            $interval = $this->getFillingSchema($totalPoint, $point + 1)->interval;
        }
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
                echo "perlu diinsert dengan point sebanyak {$pointsPerFill} </br>";
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
        // return $entries = Role::with('entries')->get();
        // return $employee = Employee::with(['employeeType', ])->find($id);
        // $employee;
        // employeeType()->roles()->entries();
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
