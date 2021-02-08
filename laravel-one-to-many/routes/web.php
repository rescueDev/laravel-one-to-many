<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

//Tasks
Route::resource('tasks', 'TaskController');

//Employees
Route::resource('employees', 'EmployeeController');

//Typologies
Route::resource('typologies', 'TypologyController');

Route::post('/task/restore', 'TaskController@restore')->name('restore-task');
