<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

//Tasks
Route::resource('tasks', 'TaskController');

//Employees
Route::resource('employees', 'EmployeeController');


// Route::put('/update/{id}', 'TaskController@update')->name('update-task');
