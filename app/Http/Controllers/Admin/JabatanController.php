<?php

namespace App\Http\Controllers\Admin;
use App\Models\Divisi;
use App\Models\Jabatan;
use App\Models\HariKerja;
use App\Models\StatusKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JabatanController extends Controller
{
    public function index()
    {
        $data ['list_jabatan'] = Jabatan::all();
        return view('_.admin.data-pegawai.setting.index', $data);
       
    }
    public function store(Jabatan $jabatan)
    {
        $jabatan = new Jabatan;
        $jabatan->jabatan = request('jabatan');
        $jabatan->save();
        return back()->with('success', 'Data berhasil Ditambah');         
    }   

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return back()->with('success', 'Data berhasil DiHapus'); 
    }
}
