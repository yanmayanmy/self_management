<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; //ルーティングで使いたいコントローラの宣言

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

Route::get("/", [App\Http\Controllers\BookController::class, 'index']); //ルートページの変更
Route::get("/books", [App\Http\Controllers\BookController::class, 'index'])->name('books.index');
Route::post("/books", [App\Http\Controllers\BookController::class, 'store'])->name('books.store');
Route::get("/books/create", [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
Route::get("/books/{book}", [App\Http\Controllers\BookController::class, 'show'])->name('books.show');
Route::patch("/books/{book}", [App\Http\Controllers\BookController::class, 'update'])->name('books.update');
Route::delete("/books/{book}", [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');
Route::get("/books/{book}/edit", [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
