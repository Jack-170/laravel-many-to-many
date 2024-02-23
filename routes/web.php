<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class, 'index'])->name('project.index');



Route::get('/types', [TypeController::class, 'index'])->name('type.index');
