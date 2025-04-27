<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::get('/', [LoginController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('home');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [RegistrationController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'register'])->name('register.store');

Route::group(['middleware' => 'auth'], function () {

    Route::POST('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');

    // Add route name for the edit and destroy routes
    Route::get('/tasks/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}/delete', [TaskController::class, 'destroy'])->name('tasks.destroy');
});
