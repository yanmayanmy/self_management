<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController; //ルーティングで使いたいコントローラの宣言
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ScheduleController;
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

// Todo
Route::get("/", [App\Http\Controllers\TodoController::class, 'index']); //Route page
Route::get("/todos", [App\Http\Controllers\TodoController::class, 'index'])->name('todos.index'); // Top page
Route::get("/todos/create", [App\Http\Controllers\TodoController::class, 'create'])->name('todos.create');

// It was pain in the a** dealing show method in one controller due to the data type.
// Thus, I made controller for each table.

// Schedule
Route::post("/schedules", [App\Http\Controllers\ScheduleController::class, 'store'])->name('schedules.store');
Route::get("/schedules/{schedule}", [App\Http\Controllers\ScheduleController::class, 'show'])->name('schedules.show');
Route::patch("/boschedulesks/{schedule}", [App\Http\Controllers\ScheduleController::class, 'update'])->name('schedules.update');
Route::delete("/schedules/{schedule}", [App\Http\Controllers\ScheduleController::class, 'destroy'])->name('schedules.destroy');
Route::get("/schedules/{schedule}/edit", [App\Http\Controllers\ScheduleController::class, 'edit'])->name('schedules.edit');

// Task
Route::post("/tasks", [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
Route::get("/tasks/{task}", [App\Http\Controllers\TaskController::class, 'show'])->name('tasks.show');  
Route::patch("/tasks/{task}", [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
Route::delete("/tasks/{task}", [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get("/tasks/{task}/edit", [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');

// Project
Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');  
Route::patch('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy');
Route::get('/projects/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
