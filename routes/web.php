<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Payroll\TestDataAbsensi;
use App\Http\Controllers\Admin\Payroll\DaftarGajiController;
use App\Http\Controllers\Admin\Payroll\FeeLemburController;
use App\Http\Controllers\Admin\Payroll\BpjsController;
use App\Http\Controllers\Admin\Payroll\JabatanController as JabatanPayrollController;
use App\Http\Controllers\Admin\Payroll\PotonganTunjanganController;
use App\Http\Controllers\Admin\Payroll\TestDataAbsensiController;
use App\Http\Controllers\Admin\Payroll\TunjanganController;
use App\Http\Controllers\Admin\DinasController;
use App\Http\Controllers\Admin\DivisiController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\HariKerjaController;
use App\Http\Controllers\Admin\DataPegawaiController;
use App\Http\Controllers\Admin\StatusKerjaController;
use App\Http\Controllers\Admin\LokasiAbsensiController;
use App\Http\Controllers\Admin\LemburController as AdminLemburController;
use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Admin\IzinCutiController as AdminIzinCutiController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

use App\Http\Controllers\Pegawai\LemburController as PegawaiLemburController;
use App\Http\Controllers\Pegawai\DinasController as PegawaiDinasController;
use App\Http\Controllers\Pegawai\AbsensiController as PegawaiAbsensiController;
use App\Http\Controllers\Pegawai\IzinCutiController as PegawaiIzinCutiController;
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboardController;
use App\Http\Controllers\Pegawai\DataProfilPegawaiController;
use App\Http\Controllers\Pegawai\DataAnakController;
use App\Http\Controllers\Pegawai\Payroll\GajiController;

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
Route::prefix('admin')->middleware('auth:admin')->group(function () {
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

    // DAFTAR GAJI
    Route::resource('daftar-gaji', DaftarGajiController::class);
    Route::get('daftar-gaji/show/{id}', [DaftarGajiController::class, 'show'])->name('admin.daftar-gaji.show');

    // SETTING JABATAN
    Route::resource('jabatan', JabatanPayrollController::class);

    // SETTING TIDAK MASUK KERJA
    Route::resource('potongan-tunjangan%Tidak-Masuk', PotonganTunjanganController::class);
    Route::get('potongan-tunjangan%Tidak-Masuk/{id}/edit', [PotonganTunjanganController::class, 'edit']);
    Route::put('potongan-tunjangan%Tidak-Masuk/{id}', [PotonganTunjanganController::class, 'update']);
    Route::delete('potongan-tunjangan%Tidak-Masuk/{id}', [PotonganTunjanganController::class, 'destroy']);

    // SETTING POTONGAN BPJS
    Route::resource('potongan-tunjangan%BPJS', BpjsController::class);
    Route::get('potongan-tunjangan%BPJS/{id}/edit', [BpjsController::class, 'edit']);
    Route::put('potongan-tunjangan%BPJS/{id}', [BpjsController::class, 'update']);
    Route::delete('potongan-tunjangan%BPJS/{id}', [BpjsController::class, 'destroy']);

    // SETTING FEE LEMBUR
    Route::resource('potongan-tunjangan%Lembur', FeeLemburController::class);
    Route::get('potongan-tunjangan%Lembur/{id}/edit', [FeeLemburController::class, 'edit']);
    Route::put('potongan-tunjangan%Lembur/{id}', [FeeLemburController::class, 'update']);
    Route::delete('potongan-tunjangan%Lembur/{id}', [FeeLemburController::class, 'destroy']);

    // SETTING TUNJANGAN
    Route::resource('potongan-tunjangan%Tunjangan', TunjanganController::class);
    Route::get('potongan-tunjangan%Tunjangan/{id}/edit', [TunjanganController::class, 'edit']);
    Route::put('potongan-tunjangan%Tunjangan/{id}', [TunjanganController::class, 'update']);
    Route::delete('potongan-tunjangan%Tunjangan/{id}', [TunjanganController::class, 'destroy']);

    // CETAK DATA
    Route::get('cetak-data/daftar-gaji', [DaftarGajiController::class, 'cetak_data'])->name('admin.daftar-gaji.cetak-data');
    Route::get('daftar-gaji/cetak-perorang/{id}', [DaftarGajiController::class, 'cetak_perorang'])->name('admin.daftar-gaji.cetak-perorang');

    // TEST DATA ABSENSI
    Route::resource('data-absensi', TestDataAbsensiController::class);
    Route::put('data-absensi/{id}', [TestDataAbsensi::class, 'update']);
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
Route::prefix('pegawai')->middleware('auth:pegawai')->group(function () {
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

    Route::get('lembur', [PegawaiLemburController::class, 'index']);
    Route::get('lembur/{lembur}', [PegawaiLemburController::class, 'show']);
    Route::post('lembur', [PegawaiLemburController::class, 'store']);
    Route::put('lembur/selesai/{lembur}', [PegawaiLemburController::class, 'selesai']);

    Route::get('dinas', [PegawaiDinasController::class, 'index']);
    Route::get('dinas/create', [PegawaiDinasController::class, 'create']);
    Route::post('dinas', [PegawaiDinasController::class, 'store']);
    Route::get('dinas/{dinas}', [PegawaiDinasController::class, 'show']);
    Route::delete('dinas/{dinas}', [PegawaiDinasController::class, 'destroy']);

    // DATA GAJI
    Route::resource('data-gaji', GajiController::class);

    // FILTER
    Route::post('data-gaji/filter', [GajiController::class, 'filter']);

    // CETAK GAJI
    Route::get('gaji/cetak-perorang/{id}', [GajiController::class, 'cetak_perorang'])->name('pegawai.gaji.cetak-perorang');

    Route::get('profil',[DataProfilPegawaiController::class,'profil']);
    // Route::get('profil/{data_keluarga}/edit',[DataPegawaiController::class,'editdkeluarga']);
    Route::POST('profil',[DataProfilPegawaiController::class,'storekeluarga']);
    Route::post('profil/anak',[DataAnakController::class,'store']);
    
    Route::get('profil/{datapegawai}/edit',[DataProfilPegawaiController::class,'edit']);
    Route::put('profil/{datapegawai}',[DataProfilPegawaiController::class,'update']);

    Route::get('profil/editkeluarga/{DKeluarga}',[DataAnakController::class,'editkeluarga']);
    Route::put('profil/editkeluarga/{datakeluarga}',[DataAnakController::class,'updatekeluarga']);
});
