<?php

use App\Http\Controllers\PencarianController;

Route::group(
    [
        'prefix'        => 'pencarian',
        'namespace'     => 'pencarian',
        'as'            => 'pencarian.',
        'middleware' => ['web']
    ],
    function () {
        Route::get('pencarian', [PencarianController::class, 'index'])->name('pencarian');
    }
);
