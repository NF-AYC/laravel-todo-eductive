<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
Route::prefix('/api')->group(function () {

    Route::get('/todos', [TodoController::class, 'index']);
});
