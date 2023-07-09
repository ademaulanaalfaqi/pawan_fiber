<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\DAnak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DKeluarga;

class DataAnakController extends Controller
{
    public function store(DAnak $dataanak)
    {
        $dataanak = new DAnak;
        $dataanak->id_user = request('id_user');
        $dataanak->nama = request('nama');
        $dataanak->hubungan = request('hubungan');
        $dataanak->anak_ke = request('anak_ke');
        $dataanak->save();
        // return $dataanak;
        return redirect('pegawai/profil')->with('success', 'Data berhasil Ditambah');
    }

    public function editkeluarga($datakeluarga){
        $datakeluarga = DKeluarga::find($datakeluarga);
        // $data['datakeluarga'] = $datakeluarga;
        // return $datakeluarga;
        return view('_.pegawai.profil.editkeluarga',['datakeluarga' => $datakeluarga]);
    }

    public function updatekeluarga(DKeluarga $datakeluarga){

        $datakeluarga->id_user = request('id_user');
        $datakeluarga->nama = request('nama');
        $datakeluarga->tempat_lahir = request('tempat_lahir');
        $datakeluarga->tanggal_lahir = request('tanggal_lahir');
        $datakeluarga->alamat = request('alamat');
        $datakeluarga->no_telepon = request('no_telepon');
        $datakeluarga->pekerjaan = request('pekerjaan');
        $datakeluarga->kewarganegaraan = request('kewarganegaraan');
        $datakeluarga->save();
        return redirect('pegawai/profil')->with('success','Data Berhasil Diubah');
    }

}
