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
Route::group(['middleware' => 'auth'], function() {
  Route::get('/', 'HomeController@index')->name('home');

  Route::get('/goals/{id}/tasks', 'TaskController@index')->name('tasks.index');

  Route::get('/goals/create', 'GoalController@showCreateForm')->name('goals.create');
  Route::post('/goals/create', 'GoalController@create');

  Route::get('/goals/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
  Route::post('/goals/{id}/tasks/create', 'TaskController@create');
  
  Route::get('/goals/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
  Route::post('/goals/{id}/tasks/{task_id}/edit', 'TaskController@edit');
});

Auth::routes();
