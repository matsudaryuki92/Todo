<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('todos/completed', [TodoController::class, 'completed'])->name('todos.completed');
Route::post('todos/{todo}/done', [TodoController::class, 'taskComplete'])->name('todos.done');
Route::get('todos/deleted', [TodoController::class, 'deleted'])->name('todos.deleted');
Route::resource('todos', TodoController::class);
