<?php

  use App\Http\Controllers\LoginController;
  use App\Http\Controllers\PostController;
  use App\Http\Controllers\RegisterController;
  use App\Models\Post;
use App\Models\User;
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
    'title' => 'Home',
    'active' => 'home',
  ]);
});

Route::view('/about', 'about', [
  'title' => 'About',
  'active' => 'about',
  'name' => 'Mohammad Asrofil Nadib',
  'email' => 'asrofilnadibs28@gmail.com',
  'image' => 'nadib.jpg',
]);

Route::get('/posts', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
  return view('categories', [
    'title' => 'Category Post',
    'active' => 'categories',
    'categories' => Category::all(),
  ]);
});

Route::get('/login', [LoginController::class, 'index']);

Route::get('/register',[RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

/*Route::get('/categories/{category:slug}', function (Category $category) {
  return view('posts', [
    'title' => "Post By Category : $category->name",
    'active' => 'categories',
    'posts' => $category->posts->load('category', 'author'),
  ]);
});*/

/*Route::get('/authors/{author:username}', function (User $author) {
  return view('posts', [
    'title' => "Post By Author : $author->name",
    'active' => 'posts',
    'posts' => $author->posts->load('author', 'category'),
  ]);
});*/

/*Route::get('tasks', 'App\Http\Controllers\TasksController@index');

Route::get('tasks/create', 'App\Http\Controllers\TasksController@create');
Route::post('tasks/store', 'App\Http\Controllers\TasksController@store');

Route::post('users/{user}/update-avatar', 'UpdateUserAvatar');*/
