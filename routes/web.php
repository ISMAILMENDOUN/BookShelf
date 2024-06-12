<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserBookController;

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

/***************************************************ROUTES FOR USERS********************************** */

Route::middleware(['auth'])->group(function () {
Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::get('/logout',[UserController::class,'logout'])->name('user.logout');
});
Route::post('/login',[UserController::class,'login'])->name('user.login');
/****************************************************ROUTES FOR BOOKS******************************* */

Route::get('/{book}/book',[BookController::class,'indexBook'])->name('index');
Route::get('/',[BookController::class,'index'])->name('book.index');
Route::get('/search',[BookController::class,'search'])->name('search_book');

/****************************************************ROUTES FOR USERS_BOOKS************************* */
Route::get('/userBook',[UserBookController::class,'index'])->name('user_book');
Route::middleware(['auth'])->group(function () {
    Route::get('/{book}/purchase',[UserBookController::class,'purchase'])->name('book.purchase');
    Route::get('/myBooks',[UserBookController::class,'myBooks'])->name('myBooks');
    });

    
/****************************************************ROUTES FOR ADMIN************************* */
Route::get('/admin',[UserController::class,'admin'])->name('adminIndex');
Route::get('/admin/create',[UserController::class,'create'])->name('user.create');
Route::post('/admin/store',[UserController::class,'store'])->name('user.store');
Route::delete('/admin/{user}/delete',[UserController::class,'delete'])->name('user.delete');
Route::get('/admin/{user}/update',[UserController::class,'update'])->name('user.update');
Route::put('/{user}/updated',[UserController::class,'updated'])->name('user.updated');