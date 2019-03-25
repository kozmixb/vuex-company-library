<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Companies
Route::get('/companies','CompanyController@index');
Route::post('/company','CompanyController@store');
Route::delete('/company/{company}','CompanyController@destroy');

//Employees
Route::get('/employees','EmployeeController@index');
Route::post('/employee','EmployeeController@store');
Route::delete('/employee/{employee}','EmployeeController@destroy');