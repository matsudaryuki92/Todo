<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('todos/completed', [TodoController::class, 'completed'])->name('todos.completed');
Route::post('todos/{todo}/done', [TodoController::class, 'taskComplete'])->name('todos.done');
Route::get('todos/deleted', [TodoController::class, 'deleted'])->name('todos.deleted');
Route::post('todos/{todo}/force_delete', [TodoController::class, 'forceDelete'])->name('todos.forceDelete');
Route::post('todos/{todo}/restore', [TodoController::class, 'restore'])->name('todos.restore');
Route::resource('todos', TodoController::class);
