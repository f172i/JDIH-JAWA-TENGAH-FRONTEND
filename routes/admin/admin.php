<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\admin\Filecontroller;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\BeritaController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\PHController;
use App\Http\Controllers\admin\LinkSurveyController;
use App\Http\Controllers\admin\AnggotaController;
use App\Http\Controllers\admin\UiController;
use App\Http\Controllers\admin\GaleriController;
use App\Http\Controllers\admin\DownloadController;
use App\Http\Controllers\admin\KatalogController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\GlosariumController;

Route::group(
    [
        'prefix'        => 'admin',
        'namespace'     => 'admin.',
        'as'            => 'admin.',
        'middleware' => ['web','auth']
    ],

    function () {
        //LOGIN
        Route::get('/dashboard', [adminController::class, 'index'])->name('dashboard');
        Route::get('/grafik-pengunjung', [adminController::class, 'grafikPengunjung'])->name('dahsboard.grafikPengunjung');
        Route::get('/getTotal', [adminController::class, 'getTotal'])->name('dahsboard.getTotal');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

        // Produk Hukum routes - accessible by all roles but with different permissions
        Route::get('/master-produk-hukum', [Filecontroller::class, 'index'])->middleware('role:superadmin,admin,opd')->name('master.file');
        Route::get('/master-produk-hukum-detail/{id}', [Filecontroller::class, 'detail'])->middleware('role:superadmin,admin,opd')->name('master.file.detail');
        Route::get('/master-produk-hukum-update/{id}', [Filecontroller::class, 'update'])->middleware('role:superadmin,admin,opd')->name('master.file.update');
        Route::post('/master-file-datatable', [Filecontroller::class, 'datatable'])->middleware('role:superadmin,admin,opd')->name('master.file.datatable');
        Route::get('/master-file-tambah', [Filecontroller::class, 'tambah'])->middleware('role:superadmin,admin,opd')->name('master.file.tambah');
        Route::post('/master-file-delete', [Filecontroller::class, 'delete'])->middleware('role:superadmin,admin,opd')->name('master.file.delete');
        Route::post('/master-file-tambah-store', [Filecontroller::class, 'store'])->middleware('role:superadmin,admin,opd')->name('master.file.tambah.store');
        Route::post('/master-file-update-proccess', [Filecontroller::class, 'update_proses'])->middleware('role:superadmin,admin,opd')->name('master.file.update.proses');
        
        // Validator and superadmin only routes
        Route::get('/master-produk-hukum-proses/{id}', [Filecontroller::class, 'proses'])->middleware('role:superadmin,validator')->name('master.file.proses');
        Route::get('/master-produk-hukum-publish/{id}', [Filecontroller::class, 'publish'])->middleware('role:superadmin,validator')->name('master.file.publish');
        Route::get('/master-produk-hukum-tolak/{id}', [Filecontroller::class, 'tolak'])->middleware('role:superadmin,validator')->name('master.file.tolak');

        // Routes that should only be accessible to superadmin
        Route::group(['middleware' => 'role:superadmin'], function () {
            // Placeholder untuk route cetak2 agar error hilang
            Route::get('/master-katalog-cetak2', function() {
                return 'Cetak2 route placeholder';
            })->name('master.katalog.cetak2');
            Route::get('/master-kategori', [KategoriController::class, 'kategori'])->name('master.kategori');
            Route::post('/master-kategori-store', [KategoriController::class, 'store'])->name('master.kategori.store');
            Route::get('/master-kategori-update/{id}', [KategoriController::class, 'update'])->name('master.kategori.update');
            Route::post('/master-kategori-update-porses', [KategoriController::class, 'update_proses'])->name('master.kategori.update.proses');
            Route::post('/master-kategori-hapus', [KategoriController::class, 'kategori_delete'])->name('master.kategori.delete');
            Route::post('/master-kategori-datatable', [KategoriController::class, 'datatable'])->name('master.kategori.datatable');

            Route::get('/master-berita', [BeritaController::class, 'index'])->name('master.berita');
            Route::get('/master-berita-tambah', [BeritaController::class, 'create'])->name('master.berita.tambah');
            Route::post('/master-berita-store', [BeritaController::class, 'store'])->name('master.berita.store');
            Route::get('/master-berita-detail/{id}', [BeritaController::class, 'detail'])->name('master.berita.detail');
            Route::get('/master-berita-update/{id}', [BeritaController::class, 'update'])->name('master.berita.update');
            Route::post('/master-berita-update-proses', [BeritaController::class, 'updateproses'])->name('master.berita.update.proses');
            Route::post('/master-berita-datatable', [BeritaController::class, 'datatable'])->name('master.berita.datatable');
            Route::post('/master-berita-delete', [BeritaController::class, 'delete'])->name('master.berita.delete');

            Route::get('/master-user', [UserController::class, 'index'])->name('master.user');
            Route::post('/master-user-datatable', [UserController::class, 'datatable'])->name('master.user.datatable');
            Route::post('/master-user-store', [UserController::class, 'store'])->name('master.user.store');
            Route::post('/master-user-hapus', [UserController::class, 'delete'])->name('master.user.delete');
            Route::get('/master-user-update/{id}', [UserController::class, 'update'])->name('master.user.update');
            Route::post('/master-user-update-porses', [UserController::class, 'update_proses'])->name('master.user.update.proses');

            Route::get('/master-pelayanan-hukum', [PHController::class, 'index'])->name('master.ph');
            Route::post('/master-pelayanan-hukum-datatable', [PHController::class, 'datatable'])->name('master.ph.datatable');
            Route::post('/master-pelayanan-hukum-hapus', [PHController::class, 'delete'])->name('master.ph.delete');
            Route::post('/master-pelayanan-hukum-store', [PHController::class, 'store'])->name('master.ph.store');
            Route::get('/master-pelayanan-hukum-update/{id}', [PHController::class, 'update'])->name('master.ph.update');
            Route::post('/master-pelayanan-hukum-update-porses', [PHController::class, 'update_proses'])->name('master.ph.update.proses');

            Route::get('/master-banner', [BannerController::class, 'index'])->name('master.banner');
            Route::post('/master-banner-datatable', [BannerController::class, 'datatable'])->name('master.banner.datatable');
            Route::post('/master-banner-store', [BannerController::class, 'store'])->name('master.banner.store');
            Route::post('/master-banner-hapus', [BannerController::class, 'delete'])->name('master.banner.delete');
            Route::get('/master-banner-publish/{id}', [BannerController::class, 'publish'])->name('master.banner.publish');

            Route::get('/master-link-survey', [LinkSurveyController::class, 'index'])->name('master.linkSurvey');
            Route::post('/master-link-survey-datatable', [LinkSurveyController::class, 'datatable'])->name('master.linkSurvey.datatable');
            Route::post('/master-link-survey-store', [LinkSurveyController::class, 'store'])->name('master.linkSurvey.store');
            Route::post('/master-link-survey-hapus', [LinkSurveyController::class, 'delete'])->name('master.linkSurvey.delete');
            Route::post('/master-link-survey-update', [LinkSurveyController::class, 'update'])->name('master.linkSurvey.update');

            Route::get('/master-anggota', [AnggotaController::class, 'index'])->name('master.anggota');
            Route::post('/master-anggota-datatable', [AnggotaController::class, 'datatable'])->name('master.anggota.datatable');
            Route::post('/master-anggota-store', [AnggotaController::class, 'store'])->name('master.anggota.store');
            Route::post('/master-anggota-hapus', [AnggotaController::class, 'delete'])->name('master.anggota.delete');
            Route::post('/master-anggota-update-proses', [AnggotaController::class, 'update_proses'])->name('master.anggota.update.proses');
            Route::get('/master-anggota-update/{id}', [AnggotaController::class, 'update'])->name('master.anggota.update');

            Route::get('/master-visi-misi', [UiController::class, 'index'])->name('master.visimisi');
            Route::post('/master-visi-misi-store', [UiController::class, 'store'])->name('master.visimisi.store');
            Route::post('/master-struktur-store', [UiController::class, 'store2'])->name('master.struktur.store');

            Route::get('/master-dasar-hukum', [UiController::class, 'dasarhukum'])->name('master.dasarhukum');
            Route::get('/master-tupoksi-biro-hukum', [UiController::class, 'tupoksi'])->name('master.tupoksi');
            Route::get('/master-kedudukan-dan-alamat', [UiController::class, 'kedudukan'])->name('master.kedudukan');
            Route::get('/master-struktur-organisasi', [UiController::class, 'struktur_organisasi'])->name('master.struktur');
            Route::get('/master-sop', [UiController::class, 'sop'])->name('master.sop');

            Route::get('/master-galeri', [GaleriController::class, 'index'])->name('master.galeri');
            Route::post('/master-galeri-datatable', [GaleriController::class, 'datatable'])->name('master.galeri.datatable');
            Route::post('/master-galeri-store', [GaleriController::class, 'store'])->name('master.galeri.store');
            Route::post('/master-galeri-hapus', [GaleriController::class, 'delete'])->name('master.galeri.delete');

            Route::get('/master-download', [DownloadController::class, 'index'])->name('master.download');
            Route::post('/master-download-datatable', [DownloadController::class, 'datatable'])->name('master.download.datatable');
            Route::post('/master-download-store', [DownloadController::class, 'store'])->name('master.download.store');
            Route::post('/master-download-hapus', [DownloadController::class, 'delete'])->name('master.download.delete');
            Route::post('/master-download-update-proses', [DownloadController::class, 'update_proses'])->name('master.download.update.proses');
            Route::get('/master-download-update/{id}', [DownloadController::class, 'update'])->name('master.download.update');

            Route::get('/master-katalog', [KatalogController::class, 'index'])->name('master.katalog');
            Route::post('/master-katalog-delete', [KatalogController::class, 'delete'])->name('master.katalog.delete');
            Route::post('/master-katalog-datatable', [KatalogController::class, 'datatable'])->name('master.katalog.datatable');
            Route::get('/master-katalog-download', [KatalogController::class, 'katalog'])->name('master.katalog.download');
            Route::post('/master-katalog-store', [KatalogController::class, 'store'])->name('master.katalog.store');

            Route::get('/master-video', [VideoController::class, 'index'])->name('master.video');
            Route::post('/master-video-datatable', [VideoController::class, 'datatable'])->name('master.video.datatable');
            Route::post('/master-video-store', [VideoController::class, 'store'])->name('master.video.store');
            Route::post('/master-video-hapus', [VideoController::class, 'delete'])->name('master.video.delete');
            Route::post('/master-video-update', [VideoController::class, 'update'])->name('master.video.update');
            Route::post('/master-video-publish', [VideoController::class, 'publish'])->name('master.video.publish');

            // GLOSARIUM ROUTES
            Route::get('/master-glosarium', [GlosariumController::class, 'admin'])->name('master.glosarium');
            Route::get('/master-glosarium/ajax-search', [GlosariumController::class, 'ajaxSearch'])->name('master.glosarium.ajax.search');
            Route::get('/master-glosarium/create', [GlosariumController::class, 'create'])->name('master.glosarium.create');
            Route::post('/master-glosarium/store', [GlosariumController::class, 'store'])->name('master.glosarium.store');
            Route::get('/master-glosarium/edit/{id}', [GlosariumController::class, 'edit'])->name('master.glosarium.edit');
            Route::put('/master-glosarium/update/{id}', [GlosariumController::class, 'update'])->name('master.glosarium.update');
            Route::delete('/master-glosarium/delete/{id}', [GlosariumController::class, 'destroy'])->name('master.glosarium.delete');
            
            // PDF Upload routes
            Route::get('/master-glosarium/upload-pdf', [GlosariumController::class, 'uploadPdfForm'])->name('master.glosarium.upload.form');
            Route::post('/master-glosarium/upload-pdf', [GlosariumController::class, 'uploadPdf'])->name('master.glosarium.upload.pdf');
            Route::post('/master-glosarium/check-pdf-exists', [GlosariumController::class, 'checkPdfExists'])->name('master.glosarium.check.pdf.exists');
            
            // Duplicate resolution routes
            Route::get('/master-glosarium/resolve-duplicates', [GlosariumController::class, 'resolveDuplicates'])->name('master.glosarium.resolve.duplicates');
            Route::post('/master-glosarium/process-duplicates', [GlosariumController::class, 'processDuplicates'])->name('master.glosarium.process.duplicates');
            
            // JSON management
            Route::post('/master-glosarium/delete-json', [GlosariumController::class, 'deleteJson'])->name('master.glosarium.delete.json');
            Route::post('/master-glosarium/simpan-istilah', [GlosariumController::class, 'simpanIstilah'])->name('master.glosarium.simpan.istilah');
            });

        // Routes that should only be accessible to superadmin (Continued)
        Route::group(['middleware' => 'role:superadmin'], function () {
            });

            // Profile route accessible by all authenticated users
            Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
            Route::post('/update-profile', [ProfileController::class, 'update'])->name('profile.update');

    }
);
