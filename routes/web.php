<?php

  use App\Http\Controllers\PostController;
  use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use \Illuminate\Support\Facades\Request;
use App\Models\Category;
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
//Route::view('/', 'welcome');

Route::get('/', function () {
  return view('home', [
    'title' => 'Home'
  ]);
});

Route::view('/about', 'about', [
  'title' => 'About',
  'name' => 'Mohammad Asrofil Nadib',
  'email' => 'asrofilnadibs28@gmail.com',
  'image' => 'nadib.jpg',
]);

Route::get('/blog', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
  return view('categories', [
    'title' => 'Category Post',
    'categories' => Category::all(),
  ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
  return view('category', [
    'title' => $category->name,
    'posts' => $category->posts,
    'category' => $category->name,
  ]);
});


  /*Route::get('tasks', 'App\Http\Controllers\TasksController@index');

  Route::get('tasks/create', 'App\Http\Controllers\TasksController@create');
  Route::post('tasks/store', 'App\Http\Controllers\TasksController@store');

  Route::post('users/{user}/update-avatar', 'UpdateUserAvatar');*/
