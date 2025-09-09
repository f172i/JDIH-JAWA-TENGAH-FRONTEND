<?php

use App\Http\Controllers\api\AnggotaJdihApiController;
use App\Http\Controllers\api\ArtikelApiController;
use App\Http\Controllers\api\CategoryApiController;
use App\Http\Controllers\api\ProdukHukumApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\IntegrasiController;
use App\Http\Controllers\api\KabKotaApiController;
use App\Http\Controllers\api\ProfileJdihApiController;
use App\Http\Controllers\api\SliderApiController;
use App\Http\Controllers\api\VideoApiController;
use App\Http\Controllers\api\VisiMisiApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json(['status' => 'success', 'message' => 'API JDIH!'], 200);;
});
Route::get('/integrasi', [IntegrasiController::class, 'index'])->name('integrasi');

// Glosarium Live Search API
Route::get('/glosarium/search', [\App\Http\Controllers\GlosariumController::class, 'apiSearch'])->name('api.glosarium.search');

