<?php

namespace App\Http\Controllers\Admin\Payroll;

use App\Http\Controllers\Controller;
use App\Models\Payroll\Bpjs;

class BpjsController extends Controller
{
    public function index()
    {
        $data['list_bpjs'] = Bpjs::all();
        return view('_.admin.bpjs.index', $data);
    }

    public function create()
    {
    }

    public function edit($id)
    {
        return view('_.admin.bpjs.edit', [
            'bpjs' => Bpjs::findOrFail($id)
        ]);
    }

    public function update($id)
    {
        $bpjs = Bpjs::find($id);
        if (request('nominal')) $bpjs->nominal = request('nominal');
        $bpjs->save();

        return redirect('admin/potongan-tunjangan%BPJS')->with('success', 'Data Berhasil Diedit');
    }

    public function store()
    {
        $bpjs = new Bpjs();
        $bpjs->nominal = request('nominal');
        $bpjs->save();

        return redirect('admin/potongan-tunjangan%BPJS')->with('success', 'Data Berhasil Ditambah');
    }

    function destroy($id)
    {
        $bpjs = Bpjs::find($id);
        $bpjs->delete();
        return redirect('admin/potongan-tunjangan%BPJS')->with('success', 'Berhasil Dihapus');
    }
}
