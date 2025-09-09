<?php

use App\Http\Controllers\BeritaController;

Route::group(
    [
        'prefix'        => 'artikel',
        'namespace'     => 'artikel',
        'as'            => 'artikel.',
        'middleware' => ['web']
    ],
    function () {
        Route::get('/', [BeritaController::class, 'index'])->name('artikel');
        Route::get('detail/{id}', [BeritaController::class, 'detail'])->name('detail');
    }
);
