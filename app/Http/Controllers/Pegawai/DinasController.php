<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\Dinas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DinasController extends Controller
{
    public function index()
    {
        $id_user = request()->user()->id;
        $data ['list_dinas'] = Dinas::where('id_user', $id_user)->get();
        // return $data;
        return view('_.pegawai.dinas.index', $data);
    }

    public function create()
    {
        return view('_.pegawai.dinas.create' );
    }

    public function store(Dinas $dinas)
    {
        $dinas = new Dinas;
        $dinas->id_user = request()->user()->id;
        $dinas->nama = request('nama');
        $dinas->tanggal_mulai = request('tanggal_mulai');
        $dinas->tanggal_selesai = request('tanggal_selesai');
        $dinas->deskripsi_dinas = request('deskripsi_dinas');
        $dinas->latitude = request('latitude');
        $dinas->longitude = request('longitude');
        $dinas->save();
        
        return redirect('pegawai/dinas')->with('success', 'Data berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dinas $dinas)
    { 
        $data ['list_dinas'] = Dinas::where('id',$dinas)->get();
        $data ['dinas'] = $dinas;
        return view('_.pegawai.dinas.show', $data);
    }

    public function update(DInas $dinas)
    {
        $dinas->nama = request('nama');
        $dinas->tanggal_mulai = request('tanggal_mulai');
        $dinas->tanggal_selesai = request('tanggal_selesai');
        $dinas->deskripsi_dinas = request('deskripsi_dinas');
        $dinas->latitude = request('latitude');
        $dinas->longitude = request('longitude');
        $dinas->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dinas $dinas)
    {
        $dinas->delete();
        return redirect('pegawai/dinas')->with('danger','Data Berhasil Dihapus');
    }
}


