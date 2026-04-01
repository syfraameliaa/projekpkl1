<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\JRController;
use App\Http\Controllers\FaskesController;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});


/* ================= HAL RS ================= */

Route::get('/halrs/formpasien', [PasienController::class, 'create']);

Route::get('/halrs/haldatapasien', [PasienController::class, 'index']);

Route::get('/halrs/edithalpasien',[PasienController::class,'edit']);

Route::get('/halrs/wlrs', function () {
    return view('halrs.wlrs');
});


/* ================= HAL JR ================= */

Route::get('/haljr/halJR', function () {
    return view('haljr.halJR');
});

Route::get('/haljr/haldatapasienjr', [JRController::class, 'datapasien']);


/* ================= FORM SIMPAN ================= */

Route::post('/pasien/store', [PasienController::class, 'store']);

/* ================= UPDATE PASIEN KONTROL ================= */

Route::post('/updatepasien',[PasienController::class,'update']);

/* ================= TAMBAH FASKES ================= */
Route::get('/addfaskes', [FaskesController::class, 'index'])->name('faskes.index');
Route::post('/addfaskes', [FaskesController::class, 'store']);




// Route::get('/addfaskes', function () {
//     return view('addfaskes');
// });