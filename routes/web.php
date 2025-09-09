<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AreaKakoController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\UnduhController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\admin\DownloadController;

use App\Http\Controllers\VideoController;
use App\Http\Controllers\GlosariumController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require 'login/login.php';
require 'admin/admin.php';
require 'inventarisasi-hukum/inventarisasiHukum.php';
require 'home/home.php';
require 'artikel/artikel.php';
require 'pencarian/pencarian.php';

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('unduh', [UnduhController::class, 'index'])->name('index');
Route::get('galeris', [GaleriController::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->name('register');

Route::post('/reload-captcha', [LoginController::class, 'refreshCaptcha'])->name('login.refresh_captcha');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

// anggota kako
Route::get('/anggota-jdih/', [AreaKakoController::class, 'index'])->name('anggota.jdih');
Route::get('/anggota-jdih/view/{id}', [AreaKakoController::class, 'view'])->name('anggota.jdih.view');
Route::get('/area-kako/{id}', [AreaKakoController::class, 'detail'])->name('area-kako.detail');

//statistik pengunjung
Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.pengunjung');
Route::get('/statistik/grafik-perbidang', [StatistikController::class, 'perbidang'])->name('statistik.perbidang');
Route::get('/statistik/grafik-berlaku-tak-berlaku', [StatistikController::class, 'berlaku_takberlaku'])->name('statistik.berlaku_takberlaku');
Route::get('/statistik/tahunan-perundangan', [StatistikController::class, 'tahunan_perundangan'])->name('statistik.tahunan_perundangan');


Route::get('//home-download', [DownloadController::class, 'home'])->name('home.download');

// visi misi
Route::get('/visi-misi', function () {
    $vm = DB::table('profile_jdih')->where('kategori', 'visimisi')->first();
    return view('page.visi-misi', compact('vm'));
})->name('visi.misi');

// sop
Route::get('/sop', function () {
    $sop = DB::table('profile_jdih')->where('kategori', 'sop')->first();
    return view('page.sop', compact('sop'));
})->name('sop');



// dasar hukum
Route::get('/dasar-hukum', function () {
    $dh = DB::table('profile_jdih')->where('kategori', 'dasarhukum')->first();
    return view('page.dasar-hukum', compact('dh'));
})->name('dasar.hukum');

// struktur organisasi
Route::get('/struktur-organisasi', function () {
    $so = DB::table('profile_jdih')->where('kategori', 'struktur_organisasi')->first();
    return view('page.struktur-organisasi', compact('so'));
})->name('struktur.organisasi');

// tupoksi biro hukum
Route::get('/tupoksi-biro-hukum', function () {
    $tp = DB::table('profile_jdih')->where('kategori', 'tupoksi')->first();
    return view('page.tupoksi-biro-hukum', compact('tp'));
})->name('tupoksi');

// kedudukan dan alamat
Route::get('/kedudukan-dan-alamat', function () {
    $kd = DB::table('profile_jdih')->where('kategori', 'kedudukan')->first();
    return view('page.kedudukan-dan-alamat', compact('kd'));
})->name('kedudukan.alamat');


// Discalimer
Route::get('/disclaimer', function () {
    return view('page.disclaimer');
})->name('disclaimer');

// Discalimer
Route::get('/privacy-policy', function () {
    return view('page.privacy');
})->name('privacy-policy');

// perpustakaan
Route::get('/perpustakaan', function () {
    return view('page.perpustakaan');
})->name('perpustakaan');

//vidio
Route::get('/videos', [VideoController::class, 'index'])->name('videos');

// Glosarium routes
Route::get('/glosarium', [GlosariumController::class, 'index'])->name('glosarium.index');
Route::get('/glosarium/cari', [GlosariumController::class, 'cari'])->name('glosarium.cari');


//redirect registrasi
Route::group(['prefix' => 'home'], function () {
    require __DIR__.'/home/home.php';
});

Route::get('/sitemap.xml', function () {
    $sitemap = Spatie\Sitemap\Sitemap::create();

    // add static pages to the sitemap
    $sitemap->add(URL::to('/'), now(), '1.0', 'daily');
    $sitemap->add(URL::to('/about'), now(), '0.9', 'monthly');

    // add dynamic pages to the sitemap
    $posts = DB::table('berita')->orderBy('tgl', 'desc')->get();
    foreach ($posts as $post) {
        $sitemap->add(URL::to('artikel/detail/'.$post->link), $post->tgl, '0.8', 'monthly');
    }

    // add dynamic pages to the sitemap
    $posts = DB::table('inventarisasi_hukum')->orderBy('created_at', 'desc')->get();
    foreach ($posts as $post) {
        $sitemap->add(URL::to("inventarisasi-hukum/detail/".$post->link), $post->created_at, '0.8', 'monthly');
    }

    return $sitemap->render('xml');
});

// // galeri
// Route::get('/home-galeri', function () {
//     $galeri = DB::table('galeri')->get();
//     return view('page.galeri.indez',compact('galeri'));
// })->name('galeri');

// Route::get('/home-download', function () {
//     $data = DB::table('download')->get();
//     return view('page.download',compact('data'));
// })->name('download');

// // coba language swi
// // Route::get('/bahasa', function () {
// //     return view('page.bahasa');
// // })->name('bahasa');

// Route::group(['middleware' => 'language'], function () {

//     Route::get('/bahasa', function () {
//         return view('page.bahasa');
//     })->name('bahasa');

// });