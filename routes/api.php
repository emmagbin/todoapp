<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\AuthenticateCustom;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

 
Route::middleware('AuthenticateCustom')->group(function () {
    // Routes requiring Bearer token and 'emmagbin' parameter authentication
Route::get('/fake', [TodoController::class, 'fetchFromJsonFakerApi']);
Route::get('/todo_getAll', [TodoController::class, 'index']);
Route::post('/todo_store', [TodoController::class, 'store']);
Route::get('/todo_get/{id}', [TodoController::class, 'show']);
Route::put('/todo_update/{id}', [TodoController::class, 'update']);
Route::delete('/todo_delete/{id}', [TodoController::class, 'destroy']);

});

