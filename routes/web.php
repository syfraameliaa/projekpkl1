<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\JRController;
use App\Http\Controllers\FaskesController;

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

/* ================= LOGIN ================= */
Route::middleware('guest')->group(function() {
    Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth', 'admin')->group(function() {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin/dashboard');
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
});
/* ================= HAL RS ================= */

Route::get('/halrs/formpasien', [PasienController::class, 'create']);

Route::get('/halrs/haldatapasien/{id_faskes}', [PasienController::class, 'index']);

Route::get('/halrs/haldatapasien/{id_faskes}', [PasienController::class, 'index']);

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