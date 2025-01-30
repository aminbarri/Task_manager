<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;



Route::get('/', [TaskController::class, 'create'])->name('task')->middleware('auth');
Route::post('/tasks/create', [TaskController::class, 'store'])->name('addtask')->middleware('auth');

Route::get('/singup', [UserController::class, 'store'])->name('singup')->middleware('guest');
Route::post('/singup/create', [UserController::class, 'create'])->name('create')->middleware('guest');
Route::get('/login', [UserController::class, 'showlogin'])->name('login_form')->middleware('guest');
Route::post('/login/auth', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');




