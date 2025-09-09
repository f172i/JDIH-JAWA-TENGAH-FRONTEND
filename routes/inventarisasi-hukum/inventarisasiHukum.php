<?php

use App\Http\Controllers\InventarisasiHukumController;
use App\Http\Controllers\KatalogController;

Route::group(
    [
        'prefix'        => 'inventarisasi-hukum',
        'namespace'     => 'inventarisasi-hukum',
        'as'            => 'inventarisasi-hukum.',
        'middleware' => ['web']
    ],
    function () {
        //
        Route::get('', [InventarisasiHukumController::class, 'index'])->name('index');
        Route::get('detail/{id}', [InventarisasiHukumController::class, 'detail'])->name('detail');
        Route::get('abstrak/{id}/{format}', [InventarisasiHukumController::class, 'abstrak'])->name('abstrak');
        Route::get('kategori/{param}', [InventarisasiHukumController::class, 'kategori'])->name('kategori');
        Route::get('subjek/{param}', [InventarisasiHukumController::class, 'subjek'])->name('subjek');
        Route::get('unduh/{id}/{jenis}', [InventarisasiHukumController::class, 'unduh'])->name('unduh');
        Route::get('katalog', [KatalogController::class, 'index'])->name('katalog');
        Route::get('katalog-pdf/{jenis}/{tahun}', [KatalogController::class, 'generatePDF'])->name('katalog.pdf');
        Route::get('katalog-manual-pdf/{id}', [KatalogController::class, 'generateManualPDF'])->name('katalog.manual.pdf');

        Route::get('unduh2/{id}/{jenis}', [InventarisasiHukumController::class, 'unduh2'])->name('unduh2');
        Route::get('unduh3/{id}/{jenis}', [InventarisasiHukumController::class, 'unduh3'])->name('unduh3');
        Route::get('download/{id}', [InventarisasiHukumController::class, 'download'])->name('download');
        Route::get('review_score/{jenis}', [InventarisasiHukumController::class, 'review_score'])->name('review_score');
    }
);
