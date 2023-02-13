<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use \Illuminate\Support\Facades\Request;
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
Route::view('/', 'welcome');

Route::get('tasks', 'App\Http\Controllers\TasksController@index');

Route::get('tasks/create', 'App\Http\Controllers\TasksController@create');
Route::post('tasks/store', 'App\Http\Controllers\TasksController@store');

Route::post('users/{user}/update-avatar', 'UpdateUserAvatar');
