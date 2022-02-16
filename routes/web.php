<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; //ルーティングで使いたいコントローラの宣言
use App\Http\Controllers\TaskController;

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

// Book
Route::get("/", [App\Http\Controllers\BookController::class, 'index']); //ルートページの変更
Route::get("/books", [App\Http\Controllers\BookController::class, 'index'])->name('books.index');
Route::post("/books", [App\Http\Controllers\BookController::class, 'store'])->name('books.store');
Route::get("/books/create", [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
Route::get("/books/{book}", [App\Http\Controllers\BookController::class, 'show'])->name('books.show');
Route::patch("/books/{book}", [App\Http\Controllers\BookController::class, 'update'])->name('books.update');
Route::delete("/books/{book}", [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');
Route::get("/books/{book}/edit", [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');

// Task
Route::post("/tasks", [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
Route::get("/tasks/{task}", [App\Http\Controllers\TaskController::class, 'show'])->name('tasks.show');  
Route::patch("/tasks/{task}", [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
Route::delete("/tasks/{task}", [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get("/tasks/{task}/edit", [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');

//一つのコントローラだと条件分岐が面倒なのでわけた

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
