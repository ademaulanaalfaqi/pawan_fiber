<?php

namespace App\Http\Controllers\Admin;

use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HariKerja;
use App\Models\Jabatan;
use App\Models\StatusKerja;

class DivisiController extends Controller
{
    
    public function index()
    {
        $data ['list_divisi'] = Divisi::all();
        $data ['list_statuskerja'] = StatusKerja::all();
        $data ['list_jabatan'] = Jabatan::all();
        $data ['list_harikerja'] = HariKerja::all();
        return view('_.admin.data-pegawai.setting.index', $data);
    }

    public function store(Divisi $divisi)
    {
        $divisi = new Divisi;
        $divisi->divisi = request('divisi');
        $divisi->save();
        return back()->with('success', 'Data berhasil Di Tambah'); 
    }

    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        return back()->with('danger', 'Data berhasil Hapus');
    }
}
