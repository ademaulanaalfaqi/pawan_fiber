<?php

namespace App\Http\Controllers\Admin\Payroll;

use App\Http\Controllers\Controller;
use App\Models\Payroll\Tunjangan;

class TunjanganController extends Controller
{
    public function index()
    {
        $data['list_tunjangan'] = Tunjangan::all();
        return view('_.admin.tunjangan.index', $data);
    }

    public function create()
    {
    }

    public function edit($id)
    {
        return view('_.admin.tunjangan.edit', [
            'tunjangan' => Tunjangan::findOrFail($id)
        ]);
    }

    public function update($id)
    {
        $tunjangan = Tunjangan::find($id);
        if (request('nama_tunjangan')) $tunjangan->nama_tunjangan = request('nama_tunjangan');
        if (request('nominal')) $tunjangan->nominal = request('nominal');
        $tunjangan->save();

        return redirect('admin/potongan-tunjangan%Tunjangan')->with('success', 'Data Berhasil Diedit');
    }

    public function store()
    {
        $tunjangan = new Tunjangan();
        $tunjangan->nominal = request('nominal');
        $tunjangan->nama_tunjangan = request('nama_tunjangan');
        $tunjangan->save();

        return redirect('admin/potongan-tunjangan%Tunjangan')->with('success', 'Data Berhasil Ditambah');
    }

    function destroy($id)
    {
        $tunjangan = Tunjangan::find($id);
        $tunjangan->delete();
        return redirect('admin/potongan-tunjangan%Tunjangan')->with('danger', 'Berhasil Dihapus');
    }
}
