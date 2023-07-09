<?php

namespace App\Http\Controllers\Admin\Payroll;

use App\Http\Controllers\Controller;
use App\Models\Payroll\Potongan;

class PotonganTunjanganController extends Controller
{
    public function index()
    {
        $data['list_potongan'] = Potongan::all();
        return view('_.admin.potongan-tunjangan.index', $data);
    }

    public function create()
    {
    }

    public function edit($id)
    {
        return view('_.admin.potongan-tunjangan.edit', [
            'potongan' => Potongan::findOrFail($id)
        ]);
    }

    public function update($id)
    {
        $potongan = Potongan::find($id);
        if (request('nominal')) $potongan->nominal = request('nominal');
        $potongan->save();

        return redirect('admin/potongan-tunjangan%Tidak-Masuk')->with('success', 'Data Berhasil Diedit');
    }

    public function store()
    {
        $potongan = new Potongan();
        $potongan->nominal = request('nominal');
        $potongan->save();

        return redirect('admin/potongan-tunjangan%Tidak-Masuk')->with('success', 'Data Berhasil Ditambah');
    }

    function destroy($id)
    {
        $potongan = Potongan::find($id);
        $potongan->delete();
        return redirect('admin/potongan-tunjangan%Tidak-Masuk')->with('success', 'Berhasil Dihapus');
    }
}
