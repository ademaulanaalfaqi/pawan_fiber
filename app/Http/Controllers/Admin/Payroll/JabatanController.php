<?php

namespace App\Http\Controllers\Admin\Payroll;

use App\Http\Controllers\Controller;
use App\Models\Payroll\Jabatan;

class JabatanController extends Controller
{
    public function index()
    {
        $data['list_jabatan'] = Jabatan::all();
        $data['list_jabatan'] = Jabatan::paginate(7);
        return view('_.admin.jabatan.index', $data);
    }

    public function create()
    {
        return view('kepegawaian.golongan.create');
    }

    public function edit(Jabatan $jabatan)
    {
        $data['jabatan'] = $jabatan;
        return view('_.admin.jabatan.edit', $data);
    }

    public function update($id)
    {
        $jabatan = Jabatan::find($id);
        if (request('nama_jabatan')) $jabatan->nama_jabatan = request('nama_jabatan');
        if (request('gapok')) $jabatan->gapok = request('gapok');
        $jabatan->save();

        return redirect('admin/jabatan')->with('success', 'Data Berhasil Diedit');
    }

    public function store()
    {
        $jabatan = new Jabatan();
        $jabatan->nama_jabatan = request('nama_jabatan');
        $jabatan->gapok = request('gapok');
        $jabatan->save();

        return redirect('admin/jabatan')->with('success', 'Data Jabatan Berhasil Ditambahkan');
    }

    function destroy(jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect('admin/jabatan')->with('danger', 'Data Berhasil Dihapus');
    }
}
