<?php

use App\Http\Controllers\Pegawai\DataAnakController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DinasController;
use App\Http\Controllers\Admin\DivisiController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\HariKerjaController;
use App\Http\Controllers\Admin\DataPegawaiController;
use App\Http\Controllers\Admin\StatusKerjaController;
use App\Http\Controllers\Admin\LokasiAbsensiController;
use App\Http\Controllers\Pegawai\DataProfilPegawaiController;
use App\Http\Controllers\Admin\LemburController as AdminLemburController;
use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Pegawai\DinasController as PegawaiDinasController;
use App\Http\Controllers\Admin\IzinCutiController as AdminIzinCutiController;
use App\Http\Controllers\Pegawai\LemburController as PegawaiLemburController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Pegawai\AbsensiController as PegawaiAbsensiController;
use App\Http\Controllers\Pegawai\IzinCutiController as PegawaiIzinCutiController;
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboardController;

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
Route::post('login', [AuthController::class, 'loginProses']);
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
    Route::get('data-pegawai/{datapegawai}/edit',[DataPegawaiController::class,'edit']);
    Route::put('data-pegawai/{datapegawai}',[DataPegawaiController::class,'update']);
    Route::delete('data-pegawai{datapegawai}', [DataPegawaiController::class, 'destroy']);
    

    Route::get('izin-cuti', [AdminIzinCutiController::class, 'index']);
    Route::get('izin-cuti/{izincuti}', [AdminIzinCutiController::class, 'show']);
    Route::put('izin-cuti/setuju/{izincuti}', [AdminIzinCutiController::class, 'setuju']);
    Route::put('izin-cuti/tolak/{izincuti}', [AdminIzinCutiController::class, 'tolak']);


    Route::get('lembur', [AdminLemburController::class, 'index']);
    Route::get('lembur/{lembur}', [AdminLemburController::class, 'show']);
    Route::delete('lembur/{lembur}', [AdminLemburController::class, 'destroy']);
    
    Route::get('dinas', [DinasController::class, 'index']);
    Route::get('dinas/{dinas}', [DinasController::class, 'show']);
    Route::delete('dinas/{dinas}', [DinasController::class, 'destroy']);



    
    // DATA SETTING
    // JABATAN
    Route::resource('data-pegawai/setting/jabatan',JabatanController::class);
    // DIVISI
    Route::resource('data-pegawai/setting/divisi',DivisiController::class);
    // HARI KERJA
    Route::resource('data-pegawai/setting/hari_kerja',HariKerjaController::class);
    // STATUS KERJA
    Route::resource('data-pegawai/setting/statuskerja',StatusKerjaController::class);

    
});

// PEGAWAI
Route::prefix('pegawai')->middleware('auth:pegawai')->group(function(){
    Route::get('dashboard', [PegawaiDashboardController::class, 'dashboard']);

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

    Route::get('lembur', [PegawaiLemburController::class, 'index']);
    Route::get('lembur/{lembur}', [PegawaiLemburController::class, 'show']);
    Route::post('lembur', [PegawaiLemburController::class, 'store']);
    Route::put('lembur/selesai/{lembur}', [PegawaiLemburController::class, 'selesai']);

    Route::get('dinas', [PegawaiDinasController::class, 'index']);
    Route::get('dinas/create', [PegawaiDinasController::class, 'create']);
    Route::post('dinas', [PegawaiDinasController::class, 'store']);
    Route::get('dinas/{dinas}', [PegawaiDinasController::class, 'show']);
    Route::delete('dinas/{dinas}', [PegawaiDinasController::class, 'destroy']);

   Route::get('profil',[DataProfilPegawaiController::class,'profil']);
//    Route::get('profil/{data_keluarga}/edit',[DataPegawaiController::class,'editdkeluarga']);
   Route::POST('profil',[DataProfilPegawaiController::class,'storekeluarga']);
   Route::post('profil/anak',[DataAnakController::class,'store']);
   
   Route::get('profil/{datapegawai}/edit',[DataProfilPegawaiController::class,'edit']);
   Route::put('profil/{datapegawai}',[DataProfilPegawaiController::class,'update']);

   Route::get('profil/editkeluarga/{DKeluarga}',[DataAnakController::class,'editkeluarga']);
   Route::put('profil/editkeluarga/{datakeluarga}',[DataAnakController::class,'updatekeluarga']);
});