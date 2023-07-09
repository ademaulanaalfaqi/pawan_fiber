<?php

namespace App\Http\Controllers\Pegawai;
use Carbon\Carbon;
use App\Models\DAnak;
use App\Models\DKeluarga;
use App\Http\Controllers\Controller;
use App\Models\DataPegawai;
use Illuminate\Support\Facades\Auth;

class DataProfilPegawaiController extends Controller
{
    public function profil(DataPegawai $datapegawai){
        $user = Auth::user();
        // $pegawai Auth::($user);
        $anakuser = DAnak::find($user);
        $userdengankeluarga = DataPegawai::with('DKeluarga','DAnak')->find($user->id);
        // $userdengankeluarga = DataPegawai::with('DAnak')->find($user->id);     
        $data['datakeluarga'] = $userdengankeluarga;
        // return $data;
        return view('_.pegawai.profil.index',$data);
    }
    
    public function storekeluarga()
    {
        $datakeluarga = new DKeluarga;
        $datakeluarga->id_user = request('id_user');
        $datakeluarga->nama = request('nama');
        $datakeluarga->tempat_lahir = request('tempat_lahir');
        $datakeluarga->tanggal_lahir = request('tanggal_lahir');
        $datakeluarga->alamat = request('alamat');
        $datakeluarga->no_telepon = request('no_telepon');
        $datakeluarga->pekerjaan = request('pekerjaan');
        $datakeluarga->kewarganegaraan = request('kewarganegaraan');
        // return $datakeluarga;
        $datakeluarga->save();
        return back()->with('success', 'Data berhasil DiTambah');
    }

    public function edit(DataPegawai $datapegawai){
        $data ['datapegawai'] = $datapegawai;
        return view('_.pegawai.profil.edit',$data);
    }
    
    public function update(DataPegawai $datapegawai)
    {
        // $datapegawai->id = request()->id;
        $datapegawai->nama = request('nama');
        $datapegawai->alamat = request('alamat');
        $datapegawai->no_handphone = request('no_handphone');
        $datapegawai->email = request('email');
        if(request('password')) $datapegawai->password = request('password');
        if(request('foto')) $datapegawai->handleUploadFoto();
        // return $datapegawai;
        $datapegawai->save();

        return redirect('pegawai/profil')->with('success', 'Data berhasil Diubah');
    }

    
}
