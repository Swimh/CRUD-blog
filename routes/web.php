<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){

});


Route::get('/', [PostController::class, 'index']);

Route::group(['prefix' => 'register'], function () {
    
    Route::get('/', [RegisterController::class, 'create']);
    Route::post('/', [RegisterController::class, 'store']);
});


Route::post('/logout', [SessionsController::class, 'logout']);
Route::get('/login', [SessionsController::class, 'create']);
Route::post('login', [SessionsController::class, 'login']);


Route::group(['prefix' => 'categories'], function () {

    Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::patch('/edit/{category}', [CategoryController::class, 'update'])->name('update.category');

    Route::post('/create', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/create', [CategoryController::class, 'create'])->name('create.category');

    Route::delete('/delete/{category}', [CategoryController::class, 'delete'])->name('delete.category');
    
    Route::get('/{category:slug}', [CategoryController::class, 'categoryPosts']);

});

Route::group(['prefix' => 'post'], function() {
    
Route::get('/add', [PostController::class, 'create'])->name('add.postPage');
Route::post('/add', [PostController::class, 'store'])->name('add.post');

Route::delete('/delete/{post}', [PostController::class, 'delete'])->name('delete.post');

Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit.post');
Route::patch('/update/{post}', [PostController::class, 'update'])->name('update.post');
});



Route::get('/{post:slug}', [PostController::class, 'show']);

Route::get('authors/{author}', [UserController::class, 'authorPosts']);




