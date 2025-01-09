<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\Tasks\TaskListController;

use App\Http\Controllers\Reports\ReportController;

use App\Services\Tasks\TaskListService;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (TaskListService $insTaskListService) {

    $listOfTask = $insTaskListService->generateAuthenticatedUserTasks();
    return view('dashboard', compact('listOfTask'));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/task', [TaskController::class, 'index'])->middleware(['auth', 'verified'])->name('task');
Route::post('/task-save', [TaskController::class, 'saveTask'])->middleware(['auth', 'verified'])->name('task.save');
Route::post('/task-delete', [TaskController::class, 'deleteTask'])->middleware(['auth', 'verified'])->name('task.delete');
Route::get('/task-list', [TaskListController::class, 'getTaskList'])->middleware(['auth', 'verified'])->name('task.list');
Route::post('/task-list-search', [TaskListController::class, 'searchTaskList'])->middleware(['auth', 'verified'])->name('task.list.search');
Route::get('/task/{taskId}', [TaskListController::class, 'openTask'])->middleware(['auth', 'verified'])->name('task.open');
Route::get('/task-pdf/{taskId}', [TaskListController::class, 'pdfTask'])->middleware(['auth', 'verified'])->name('task.pdf');

Route::get('/report', [ReportController::class, 'index'])->middleware(['auth', 'verified'])->name('report');
Route::post('/report-generate', [ReportController::class, 'generateReport'])->middleware(['auth', 'verified'])->name('report.generate');
