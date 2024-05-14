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
Route::get('/todos/{todo}', [TodoController::class, 'show'])->middleware('auth:sanctum');
Route::post('/todos', [TodoController::class, 'store'])->middleware('auth:sanctum');
Route::put('/todos/{todo}', [TodoController::class, 'update'])
    ->middleware('can:update,todo')
    ->middleware('auth:sanctum');
Route::delete('/todos/{todo}', [TodoController::class, 'delete'])
    ->can('delete', 'todo')
    ->middleware('auth:sanctum');
// Route::apiResource('/todos', TodoController::class)->middleware('auth:sanctum');