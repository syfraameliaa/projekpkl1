<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\JRController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\PuskesController;

Route::get('/', function () {
    if (Auth::check()) {
        $usertype = Auth::user()->usertype;
        switch($usertype) {
            case 'admin':
                return redirect('admin/dashboard');
            case 'rs':
                return redirect('halrs/wlrs');
            case 'puskes':
                return redirect('halpuskes/halPS');
            case 'jr':
                return redirect('haljr/halJR');
        }
    }
    return view('index');
});

Route::get('/index', function () {
    if (Auth::check()) {
        $usertype = Auth::user()->usertype;
        switch($usertype) {
            case 'admin':
                return redirect('admin/dashboard');
            case 'rs':
                return redirect('halrs/wlrs');
            case 'puskes':
                return redirect('halpuskes/halPS');
            case 'jr':
                return redirect('haljr/halJR');
        }
    }
    return view('index');
});

/* ================= LOGIN ================= */
Route::middleware('guest')->group(function() {
    Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
});

Route::middleware('auth', 'admin')->group(function() {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin/dashboard');
});
/* ================= HAL RS ================= */
Route::middleware('auth', 'rs')->group(function() {
    Route::get('/halrs/formpasien', [PasienController::class, 'create']);
    Route::get('/halrs/haldatapasien', [PasienController::class, 'index']);
    Route::get('/halrs/edithalpasien',[PasienController::class,'edit']);
    Route::get('/halrs/wlrs', function () {
        return view('halrs.wlrs');
    });
});


/* ================= HAL JR ================= */
Route::middleware('auth', 'jr')->group(function() {
    Route::get('/haljr/halJR', function () {
        return view('haljr.halJR');
    });
    Route::get('/haljr/haldatapasienjr', [JRController::class, 'datapasien']);
});


/* ================= FORM SIMPAN ================= */

Route::post('/pasien/store', [PasienController::class, 'store']);

/* ================= UPDATE PASIEN KONTROL ================= */

Route::post('/updatepasien',[PasienController::class,'update']);

/* ================= TAMBAH FASKES ================= */
Route::get('/addfaskes', [FaskesController::class, 'index'])->name('faskes.index');
Route::post('/addfaskes', [FaskesController::class, 'store']);


/* ================= HAL PUSKES ================= */
Route::middleware('auth', 'puskes')->group(function() {
    Route::get('/halpuskes/halPS', function () {
        return view('halpuskes.halPS');
    });
    Route::get('/halpuskes/haldatapasienps', [PuskesController::class, 'datapasien']);
    Route::get('/halpuskes/formpasien', [PasienController::class, 'create']);
    Route::get('/halpuskes/edithalpasien',[PasienController::class,'edit']);
});

// Route::get('/addfaskes', function () {
//     return view('addfaskes');
// });