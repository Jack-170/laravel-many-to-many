<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\TechnologyController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/v1'], function () {

    Route::get('test', [TechnologyController::class, 'getTest']);

    Route::get('technologies', [TechnologyController::class, 'getTechnologies']);

    Route::post('technologies', [TechnologyController::class, 'createTechnologies']);
});
