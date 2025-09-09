<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::group(
    [
        'prefix'        => 'login',
        'namespace'     => 'login',
        'as'            => 'login.',
        'middleware' => ['web']
    ],
    function () {
        //LOGIN
        Route::get('', [LoginController::class, 'index'])->name('login');
        Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('proses');
        Route::post('/reload-captcha', [LoginController::class, 'refreshCaptcha'])->name('refresh_captcha');
    }
);

// REGISTER ROUTES
Route::group(
    [
        'prefix'        => 'register',
        'namespace'     => 'register',
        'as'            => 'register.',
        'middleware' => ['web']
    ],
    function () {
        Route::get('', [RegisterController::class, 'index'])->name('register');
        Route::post('/register-proses', [RegisterController::class, 'register_proses'])->name('proses');
        Route::post('/reload-captcha', [RegisterController::class, 'refreshCaptcha'])->name('refresh_captcha');
    }
);
