<?php

namespace App\Http\Controllers\Admin\Payroll;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPegawai;
use App\Models\Payroll\Bpjs;
use App\Models\Payroll\DaftarGaji;
use App\Models\Jabatan;
use App\Models\Payroll\Lembur;
use App\Models\Payroll\Potongan;
use App\Models\Payroll\TestDataAbsensi;
use App\Models\Payroll\Tunjangan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class DaftarGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $potongan = Potongan::select('*')->from('potongan')->get();
        $fee_lembur = Lembur::select('*')->from('fee_lembur')->get();
        $bpjs = Bpjs::select('*')->from('bpjs')->get();
        $gaji = TestDataAbsensi::where('bulan', '=', $bulantahun)->get();

        return view('_.admin.daftar-gaji.index', compact('potongan', 'gaji', 'fee_lembur', 'bpjs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $daftar_gaji = new DaftarGaji();
        $daftar_gaji->periode = request('periode');
        $daftar_gaji->save();

        return redirect('admin/daftar-gaji');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tunjangan = Tunjangan::all();
        $bpjs = Bpjs::select('*')->from('bpjs')->get();
        $fee_lembur = Lembur::select('*')->from('fee_lembur')->get();
        $gaji = TestDataAbsensi::findOrFail($id);
        $potongan = Potongan::select('*')->from('potongan')->get();
        $isNominalBerubah = $gaji->isDirty('nominal');
        
        return view('_.admin.daftar-gaji.show', compact('gaji', 'potongan', 'bpjs', 'fee_lembur', 'tunjangan', 'isNominalBerubah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('_.admin.daftar-gaji.edit', [
            'gaji' => TestDataAbsensi::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cetak_data()
    {
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $potongan = Potongan::select('*')->from('potongan')->get();
        $fee_lembur = Lembur::select('*')->from('fee_lembur')->get();
        $bpjs = Bpjs::select('*')->from('bpjs')->get();
        $gaji = TestDataAbsensi::where('bulan', '=', $bulantahun)->get();
        return view('_.admin.daftar-gaji.cetak-data', compact('potongan', 'gaji', 'fee_lembur', 'bpjs'));
    }

    public function cetak_perorang($id)
    {
        $bpjs = Bpjs::select('*')->from('bpjs')->get();
        $fee_lembur = Lembur::select('*')->from('fee_lembur')->get();
        $gaji = TestDataAbsensi::findOrFail($id);
        $potongan = Potongan::select('*')->from('potongan')->get();
        return view('_.admin.daftar-gaji.cetak-perorang', compact('potongan', 'gaji', 'fee_lembur', 'bpjs'));
    }
}
