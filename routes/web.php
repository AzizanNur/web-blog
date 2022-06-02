<?php

// use App\Models\Post;
// use App\Models\User;
use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;
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
    return view('home', [
        "title" => "home",        
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "name" => "azizan nur rohman",
        "email" => "azizan@kly.id",
        "image" => "azizan.png",
    ]);
}); 

Route::get('/blog', [PostController::class, 'index']);

//halaman singel post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts', [
//         'title' => "Post By Category: $category->name",
//         "active" => 'categories',
//         'posts' => $category->posts->load('user', 'category'), //ini menggunakan lazy eager loading,
//     ]);
// });
Route::get('/categories/', function(){
    return view('user', [
        'title' => 'Post By Categories',
        'posts' => Category::all(),
    ]);
});

// Route::get('/user/', function(){
//     return view('user', [
//         'title' => 'Users',
//         'posts' => User::all(),
//         "active" => 'blog',
//     ]);
// });

// Route::get('/user/{user:slug}', function(User $user){
//     return view('posts', [
//         'title' => "Post By Author: $user->name",
//         'posts' => $user->posts->load('user', 'category'), //ini menggunakan lazy eager loading
//     ]);
// });

//=======================================//
// LoginController
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //only guest can access
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest'); //only guest can access
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');//only user already login

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');//only user already login

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');