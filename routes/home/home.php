<?php

use App\Http\Controllers\HomeController;

Route::group(
    [
        'prefix'        => '',
        'namespace'     => 'beranda',
        'as'            => 'beranda.',
        'middleware' => ['web']
    ],
    function () {
        //
        Route::get('/', [HomeController::class, 'index'])->name('beranda');
        Route::get('details/{id}', [HomeController::class, 'detail'])->name('detail');
    }
);
