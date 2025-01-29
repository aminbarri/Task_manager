<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('main');
});

Route::get('/tasks', [TaskController::class, 'store'])->name('task');
Route::get('/singup', [UserController::class, 'store'])->name('singup');
Route::post('/singup/create', [UserController::class, 'create'])->name('create');

