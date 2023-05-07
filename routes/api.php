<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// api/users
// users.index
Route::get('users', \App\Http\Controllers\Api\User\IndexController::class)->name('index');
