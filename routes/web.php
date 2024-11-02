<?php

use App\Http\Controllers\BarangController_222291;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

// Rute untuk pengguna yang sudah terautentikasi
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('billing', function () {
        return view('billing');
    })->name('billing');

    Route::get('profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('rtl', function () {
        return view('rtl');
    })->name('rtl');

    Route::get('user-management', function () {
        return view('laravel-examples/user-management');
    })->name('user-management');

    Route::get('tables', function () {
        return view('tables');
    })->name('tables');

    Route::get('virtual-reality', function () {
        return view('virtual-reality');
    })->name('virtual-reality');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class,  'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
});

// Rute untuk barang
Route::get('/barang', [BarangController_222291::class, 'index'])->name('barang.index');

Route::group(['middleware' => 'role:admin'], function () {
    Route::get('/barang/add', [BarangController_222291::class, 'create'])->name('barang.create');
    Route::post('/barang', [BarangController_222291::class, 'store'])->name('barang.store');
    Route::get('/barang/{id}', [BarangController_222291::class, 'show'])->name('barang.show');
    Route::get('/barang/edit/{id}', [BarangController_222291::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{id}', [BarangController_222291::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController_222291::class, 'destroy'])->name('barang.destroy');

	Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});

// Rute untuk peminjaman barang
Route::get('/barang/{id}/sewa', [PeminjamanController::class, 'showSewaForm'])->name('barang.sewa');
Route::post('/barang/{id}/sewa', [PeminjamanController::class, 'store'])->name('barang.sewa.store');
Route::get('/peminjaman', [PeminjamanController::class, 'showList'])->name('peminjaman.showList');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('/peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::put('/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.show');

// Rute untuk user
Route::group(['middleware' => 'role:user'], function () {
    Route::get('/user/barang', [BarangController_222291::class, 'index'])->name('user.barang.index');
});

// Rute untuk pengelolaan sesi
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/session', [SessionsController::class, 'store']);
    Route::get('/login/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

// Rute untuk kategori