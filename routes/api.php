<?php

use App\Http\Controllers\Api\User\IndexController;
use App\Http\Controllers\Api\User\StoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')
    ->as('users.')
    ->group(function () {
        Route::get('/', IndexController::class)->name('index');
        Route::post('/', StoreController::class)->name('store');
    });
