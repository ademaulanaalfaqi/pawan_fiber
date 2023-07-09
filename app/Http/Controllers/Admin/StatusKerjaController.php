<?php

namespace App\Http\Controllers\Admin;

use App\Models\StatusKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusKerjaController extends Controller
{
    public function index()
    {
        $data['list_statuskerja'] = StatusKerja::all();
        return view('_.admin.data-pegawai.setting.index', $data);
    }

    public function store(StatusKerja $statuskerja)
    {
        $statuskerja = new StatusKerja;
        $statuskerja->statuskerja = request('statuskerja');
        $statuskerja->save();
        return back()->with('success', 'Data berhasil DiTambah'); 
    }

    public function destroy(StatusKerja $statuskerja)
    {
        $statuskerja->delete();
        return back()->with('success', 'Data berhasil DiHapus'); 
    }
}
