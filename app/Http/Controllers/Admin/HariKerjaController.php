<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HariKerja;
use Illuminate\Http\Request;

class HariKerjaController extends Controller
{
    public function index()
    {
        $data ['list_harikerja'] = HariKerja::all();
        return view('_.admin.data-pegawai.setting.hari_kerja.index', $data);
    }

    public function store(HariKerja $harikerja)
    {
        $harikerja = new HariKerja;
        $harikerja->hari_kerja = request('hari_kerja');
        $harikerja->save();
        return back()->with('success', 'Data berhasil Di Tambah');
    }

    public function destroy(HariKerja $hari_kerja)
    {
        $hari_kerja->delete();
        return back()->with('danger', 'Data berhasil Di Hapus');
       
    }
}
