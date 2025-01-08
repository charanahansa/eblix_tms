<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\Tasks\TaskListController;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::prefix('task')->group(function () {
    Route::get('/auth-task-list', [TaskListController::class, 'getAuthenticatedUserTasks'])->name('auth-task-list')->middleware('auth:sanctum');
    Route::post('/create-task', [TaskController::class, 'saveTask'])->name('create-task')->middleware('auth:sanctum');
});
