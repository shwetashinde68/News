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
Route::get('/login', function () {
    return view('login');
});

// Route::post('/home', function () {
//     return view('welcome');
// });
Route::post('/check', [\App\Http\Controllers\PostController::class, 'login']); 

Route::get('/post', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/blog/{post}', [\App\Http\Controllers\PostController::class, 'show']);
Route::get('/blog/create/post', [\App\Http\Controllers\PostController::class, 'create']);
Route::post('/blog/create/post', [\App\Http\Controllers\PostController::class, 'store']); //saves the created post to the databse
Route::get('/blog/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit']); //shows edit post form
Route::put('/blog/{post}/edit', [\App\Http\Controllers\PostController::class, 'update']); //commits edited post to the database 
Route::delete('/blog/{post}', [\App\Http\Controllers\PostController::class, 'destroy']); //deletes post from the database

Route::get('/subscribe', [\App\Http\Controllers\SendEmailController::class, 'index']);
Route::post('/sendemail/save', [\App\Http\Controllers\SendEmailController::class, 'store']);
