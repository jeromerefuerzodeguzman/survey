<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Employee Routes
Route::get('employee', 'EmployeeController@index');
Route::get('employee/add', 'EmployeeController@employee_form');
Route::post('employee_add', 'EmployeeController@add');
Route::get('employee/manage/{id}', 'EmployeeController@manage');
Route::post('employee/manage/save', 'EmployeeController@manage_save');
Route::get('search_form', 'EmployeeController@search_form');
Route::post('search', 'EmployeeController@search');

//User Routes
Route::get('admin_login', 'UserController@login');
Route::any('logout', 'UserController@logout');
Route::post('authenticate', 'UserController@authenticate');

//Questions Routes
Route::get('code/{code}', 'QuestionController@index');

//Answer Routes:
Route::post('survey/answer', 'AnswerController@save');
Route::get('thankyou', 'AnswerController@thankyou');

