<?php

use App\Http\Controllers\Api\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController; 
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/todos', [TodoController::class, 'index'])->middleware('auth:sanctum');
Route::post('/todos', [TodoController::class, 'store'])->middleware('auth:sanctum');