<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;

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
/***************************************************ROUTES FOR USERS********************************** */
Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::get('/create',[UserController::class,'create'])->name('user.create');
Route::post('/user/store',[UserController::class,'store'])->name('user.store');
Route::delete('/user/{user}/delete',[UserController::class,'delete'])->name('user.delete');
Route::get('/user/{user}/update',[UserController::class,'update'])->name('user.update');
Route::put('/{user}/updated',[UserController::class,'updated'])->name('user.updated');
/****************************************************ROUTES FOR BOOKS******************************* */

Route::get('/book',[BookController::class,'index'])->name('book.index');


/****************************************************ROUTES FOR USERS_BOOKS************************* */
Route::get('/userBook',[BookController::class,'index'])->name('book.index');