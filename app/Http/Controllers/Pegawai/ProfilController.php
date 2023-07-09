<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\DataPegawai;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $id = request()->user()->id;
        $data ['datapegawai'] = DataPegawai::find($id);
        $data ['list_datapegawai'] = DataPegawai::all();
        return view('_.pegawai.profil.index', $data);
    }

    public function update(DataPegawai $datapegawai)
    {
        $datapegawai->nama = request('nama');
        $datapegawai->alamat = request('alamat');
        $datapegawai->email = request('email');
        $datapegawai->no_handphone = request('no_handphone');
        if(request('password')) $datapegawai->password = request('password');
        if(request('foto')) $datapegawai->handleUploadFoto();
        $datapegawai->save();

        return redirect('pegawai/profil')->with('success', 'Data Berhasil Diubah');
    }
}
