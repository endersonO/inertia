<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::view('/', 'index');

Route::get('dashboard',[App\Http\Controllers\MateriaController::class, 'index'])
    ->middleware('auth:sanctum')
    ->name('dashboard');

Route::resource('materia', App\Http\Controllers\MateriaController::class)
    ->middleware('auth:sanctum'); 

Route::get('/',[App\Http\Controllers\MateriaController::class, 'index']);
