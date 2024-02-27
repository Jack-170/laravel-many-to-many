<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class, 'index'])->name('project.index');



Route::get('/types', [TypeController::class, 'index'])->name('type.index');

Route::get('/create', [ProjectController::class, 'create'])->name('project.create');

Route::post('/create', [ProjectController::class, 'store'])->name('project.store');

Route::get('{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');

Route::put('{id}/edit', [ProjectController::class, 'update'])->name('project.update');

Route::get('/{id}', [ProjectController::class, 'show'])
    ->name('project.show');
