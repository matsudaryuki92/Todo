<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return view('welcome');
});

Route::prefix('todos')->name('todos.')->group(function() {
    Route::get('/completed', [TodoController::class, 'completed'])->name('completed');
    Route::post('/{todo}/completed', [TodoController::class, 'complete'])->name('done');
    Route::get('/deleted', [TodoController::class, 'deleted'])->name('deleted');
    Route::post('/{todo}/force_delete', [TodoController::class, 'forceDelete'])->name('forceDelete');
    Route::post('/{todo}/restore', [TodoController::class, 'restore'])->name('restore');
});

Route::resource('todos', TodoController::class);

