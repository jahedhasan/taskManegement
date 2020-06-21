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

// Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/daily_task', 'DailyTaskController');


Route::resource('/task_management', 'TaskManagementController');

Route::get('task_manage/view', 'TaskManagementController@view')->name('task_management.view');
Route::get('/task_manage/date/', 'TaskManagementController@task_date')->name('task_management.date');
Route::put('/task_manage/edit/', 'TaskManagementController@task_edit')->name('task_management.task_edit');


/**
 * Json Route
 */
