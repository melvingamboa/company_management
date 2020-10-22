<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/hello', function () {
    return "Hello";
    // return view('welcome');
});

Route::get('profile', 'ProfilesController@list');

Auth::routes();
// Routes for Companies

Route::get('/companies/index', 'CompaniesController@index');
Route::get('/companies/create', 'CompaniesController@create');
Route::post('/companies/store', 'CompaniesController@store');
Route::patch('/companies/{company_id}', 'CompaniesController@update');
Route::get('/companies/edit/{company_id}', 'CompaniesController@edit');
Route::get('/companies/{company_id}', 'CompaniesController@show');
Route::delete('/companies/destroy/{company_id}', 'CompaniesController@destroy');

// Routes for Employees
Route::get('/employees/employeelist', 'EmployeesController@employeelist');

Route::get('/employees/index', 'EmployeesController@index');
Route::get('/employees/ajaxEmployees', 'EmployeesController@ajaxEmployees');
Route::get('/employees/create', 'EmployeesController@create');
Route::post('/employees/store', 'EmployeesController@store');
Route::delete('/employees/destroy/{employee_id}', 'EmployeesController@destroy');
Route::get('/employees/{employee_id}', 'EmployeesController@show');







