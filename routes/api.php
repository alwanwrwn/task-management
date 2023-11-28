<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create', [TaskController::class, 'create']);
Route::get('/read', [TaskController::class, 'read']);
Route::put('/update', [TaskController::class, 'update']);
Route::post('/delete', [TaskController::class, 'delete']);

Route::get('/get', [TaskController::class, 'getPerStatus']);


