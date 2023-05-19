<?php

namespace App\Http\Controllers\Admin;

use App\Models\DataPegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['list_datapegawai'] = DataPegawai::all();
        return view('_.admin.data-pegawai.index', $data);
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
        $$datapegawai = new DataPegawai;
        $datapegawai->nik = request('nik');
        $datapegawai->nama = request('nama');
        $datapegawai->no_handphone = request('no_handphone');
        $datapegawai->gaji_pokok = request('gaji_pokok');
        $datapegawai->status_kerja = request('status_kerja');
        $datapegawai->jatah_cuti = request('jatah_cuti');
        $datapegawai->tanggal_berakhir = request('tanggal_berakhir');
        $datapegawai->jam_kerja = request('jam_kerja');
        $datapegawai->tanggal_lahir = request('tanggal_lahir');
        $datapegawai->jenis_kelamin = request('jenis_kelamin');
        $datapegawai->email = request('email');
        $datapegawai->divisi = request('divisi');
        $datapegawai->jabatan = request('jabatan');
        $datapegawai->tanggal_masuk = request('tanggal_masuk');
        $datapegawai->password = request('password');
        $datapegawai->handleUploadFoto();
        $datapegawai->save();

        return redirect('admin/data-pegawai');
    }

    /**
     * Display the specified resource.
     */
    public function show( $datapegawai)
    {
        $data ['datapegawai'] = DataPegawai::find($datapegawai);
        return view('_.admin.data-pegawai.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPegawai $datapegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataPegawai $datapegawai)
    {
        $datapegawai->nik = request('nik');
        $datapegawai->nama = request('nama');
        $datapegawai->no_handphone = request('no_handphone');
        $datapegawai->gaji_pokok = request('gaji_pokok');
        $datapegawai->status_kerja = request('status_kerja');
        $datapegawai->jatah_cuti = request('jatah_cuti');
        $datapegawai->tanggal_berakhir = request('tanggal_berakhir');
        $datapegawai->jam_kerja = request('jam_kerja');
        $datapegawai->tanggal_lahir = request('tanggal_lahir');
        $datapegawai->jenis_kelamin = request('jenis_kelamin');
        $datapegawai->email = request('email');
        $datapegawai->divisi = request('divisi');
        $datapegawai->jabatan = request('jabatan');
        $datapegawai->tanggal_masuk = request('tanggal_masuk');
        if(request('password')) $datapegawai->password = request('password');
        if(request('foto')) $datapegawai->handleUploadFoto();
        $datapegawai->save();

        return redirect('admin/data-pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPegawai $datapegawai)
    {
        $datapegawai->delete();
        return redirect('admin/data-pegawai');
    }
}
