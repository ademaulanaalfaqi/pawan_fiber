<?php

namespace App\Http\Controllers\Admin;


use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\IzinCuti;
use App\Models\DKeluarga;
use App\Models\HariKerja;
use App\Models\DataPegawai;
use App\Models\StatusKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Payroll\Jabatan as JabatanPayroll;
use App\Models\DAnak;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {              
        $data['list_jabatan'] = JabatanPayroll::all();             
        $data ['list_izin'] = IzinCuti::all();
        $data ['list_harikerja'] = HariKerja::all();
        $data ['list_statuskerja'] = StatusKerja::all();
        $data ['list_divisi'] = Divisi::all();
        $data ['list_dkeluarga'] = DKeluarga::all();
        $data ['list_jabatan'] = Jabatan::all();
        $data ['total_pengajuan'] = IzinCuti::where('status', '1')->count();
        $data ['list_datapegawai'] = DataPegawai::all();
        return view('_.admin.data-pegawai.index', $data);
    }
    public function store(DataPegawai $datapegawai)
    {
        $datapegawai = new DataPegawai;
        // $$datapegawai = new Biodata;
        $datapegawai->nik = request('nik');
        $datapegawai->nama = request('nama');
        $datapegawai->alamat = request('alamat');
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
        $datapegawai->id_jabatan = request('jabatan');
        $datapegawai->tanggal_masuk = request('tanggal_masuk');
        $datapegawai->password = request('password');
        $datapegawai->handleUploadFoto();
        $datapegawai->save();

        return redirect('admin/data-pegawai')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show($datapegawai)
    {
        $data['datapegawai'] = DataPegawai::find($datapegawai);
        return view('_.admin.data-pegawai.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit (DataPegawai $datapegawai)
    {
        $data ['list_harikerja'] = HariKerja::all();
        $data ['list_statuskerja'] = StatusKerja::all();
        $data ['list_divisi'] = Divisi::all();
        $data ['list_jabatan'] = Jabatan::all();
        $data ['datapegawai'] = $datapegawai;
        return view('_.admin.data-pegawai.edit', $data);
    }

   
    public function update(DataPegawai $datapegawai)
    {
        // $datapegawai->id = request()->id;
        $datapegawai->nik = request('nik');
        $datapegawai->nama = request('nama');
        $datapegawai->alamat = request('alamat');
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
        if (request('password')) $datapegawai->password = request('password');
        if (request('foto')) $datapegawai->handleUploadFoto();
        $datapegawai->save();

        return redirect('admin/data-pegawai')->with('warning', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPegawai $datapegawai)
    {
        $datapegawai->delete();
        // return $datapegawai;
        return redirect('admin/data-pegawai')->with('Danger', 'Data berhasil di hapus');
    }

    public function cetak_pdf(DataPegawai $datapegawai)
    {
        $data ['datapegawai'] = $datapegawai;
        return view('_.Pegawai.profil.cetak_pdf', $data);
    }


    
}
