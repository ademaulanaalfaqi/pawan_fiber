<?php

namespace App\Http\Controllers\Pegawai\Payroll;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Payroll\Bpjs;
use App\Models\Payroll\Lembur;
use App\Models\Payroll\Potongan;
use App\Models\Payroll\TestDataAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pegawai = auth()->user();
        $nik = request()->user()->nik;
        $potongan = Potongan::select('*')->from('potongan')->get();
        $fee_lembur = Lembur::select('*')->from('fee_lembur')->get();
        $gaji = TestDataAbsensi::where('nik', $nik)->get();
        $bpjs = Bpjs::select('*')->from('bpjs')->get();
        return view('_.pegawai.gaji.index', compact('potongan', 'gaji', 'fee_lembur', 'pegawai', 'bpjs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

    public function cetak_perorang($id)
    {
        $bpjs = Bpjs::select('*')->from('bpjs')->get();
        $fee_lembur = Lembur::select('*')->from('fee_lembur')->get();
        $gaji = TestDataAbsensi::findOrFail($id);
        $potongan = Potongan::select('*')->from('potongan')->get();
        return view('_.pegawai.gaji.cetak-perorang', compact('potongan', 'gaji', 'fee_lembur', 'bpjs'));
    }
}
