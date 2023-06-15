<?php

use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DataPegawaiController;
use App\Http\Controllers\Admin\IzinCutiController as AdminIzinCutiController;
use App\Http\Controllers\Admin\LokasiAbsensiController;
use App\Http\Controllers\Pegawai\AbsensiController as PegawaiAbsensiController;
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboardController;
use App\Http\Controllers\Pegawai\IzinCutiController as PegawaiIzinCutiController;
use App\Http\Controllers\Pegawai\ProfilController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'LoginProses']);
Route::get('logout', [AuthController::class, 'logout']);

// ADMIN
Route::prefix('admin')->middleware('auth:admin')->group(function(){
    Route::get('dashboard', [AdminDashboardController::class, 'dashboard']);


    Route::get('absensi', [AdminAbsensiController::class, 'index']);
    Route::get('absensi/{absensi}', [AdminAbsensiController::class, 'show']);


    Route::get('lokasi_absensi', [LokasiAbsensiController::class, 'index']);
    Route::get('lokasi_absensi/create', [LokasiAbsensiController::class, 'create']);
    Route::post('lokasi_absensi', [LokasiAbsensiController::class, 'store']);
    Route::get('lokasi_absensi/{lokasiabsensi}', [LokasiAbsensiController::class, 'show']);
    Route::get('lokasi_absensi/{lokasiabsensi}/edit', [LokasiAbsensiController::class, 'edit']);
    Route::put('lokasi_absensi/{lokasiabsensi}', [LokasiAbsensiController::class, 'update']);


    Route::get('data-pegawai', [DataPegawaiController::class, 'index']);
    Route::get('data-pegawai/{datapegawai}', [DataPegawaiController::class, 'show']);
    Route::delete('data-pegawai/{datapegawai}', [DataPegawaiController::class, 'destroy']);
    Route::post('data-pegawai', [DataPegawaiController::class, 'store']);
    Route::put('data-pegawai{datapegawai}', [DataPegawaiController::class, 'update']);
    Route::delete('data-pegawai{datapegawai}', [DataPegawaiController::class, 'destroy']);
    

    Route::get('izin-cuti', [AdminIzinCutiController::class, 'index']);
    Route::get('izin-cuti/{izincuti}', [AdminIzinCutiController::class, 'show']);
    Route::put('izin-cuti/setuju/{izincuti}', [AdminIzinCutiController::class, 'setuju']);
    Route::put('izin-cuti/tolak/{izincuti}', [AdminIzinCutiController::class, 'tolak']);
});

// PEGAWAI
Route::prefix('pegawai')->middleware('auth:pegawai')->group(function(){
    Route::get('dashboard', [PegawaiDashboardController::class, 'dashboard']);
    Route::get('profil', [ProfilController::class, 'index']);
    Route::put('profil/{datapegawai}', [ProfilController::class, 'update']);


    Route::get('absensi', [PegawaiAbsensiController::class, 'index']);
    Route::get('absensi/create', [PegawaiAbsensiController::class, 'create']);
    Route::get('absensi/{absensi}', [PegawaiAbsensiController::class, 'show']);
    Route::post('absensi', [PegawaiAbsensiController::class, 'store']);
    Route::put('absensi/istirahat/{absensi}', [PegawaiAbsensiController::class, 'istirahat']);
    Route::put('absensi/pulang/{absensi}', [PegawaiAbsensiController::class, 'pulang']);


    Route::get('izin-cuti', [PegawaiIzinCutiController::class, 'index']);
    Route::get('izin-cuti/{izincuti}', [PegawaiIzinCutiController::class, 'show']);
    Route::post('izin-cuti', [PegawaiIzinCutiController::class, 'store']);
    Route::put('izin-cuti/{izincuti}', [PegawaiIzinCutiController::class, 'update']);

});