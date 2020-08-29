<?php

use App\Employee;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/task', function(Request $request){
    $employeeId = $request->input('employee_id');
    $entry = $request->input('entries');

    dd(compact('entry', 'employeeId'));

    $employee = Employee::find($employeeId);
    $employee->entries()->attach($entry);
});

Route::get('/task/employee/{id}', 'TaskController@show');