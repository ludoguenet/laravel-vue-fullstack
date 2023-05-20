<?php

use App\Http\Controllers\Api\User\IndexController;
use App\Http\Controllers\Api\User\ShowController;
use App\Http\Controllers\Api\User\StoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')
    ->as('users.')
    ->group(function () {
        Route::get('/', IndexController::class)->name('index');
        Route::get('/{user}', ShowController::class)->name('show');
        Route::post('/', StoreController::class)->name('store');
    });
