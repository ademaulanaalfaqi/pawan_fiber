<?php

namespace App\Http\Controllers\Admin\Payroll;

use App\Http\Controllers\Controller;
use App\Models\Payroll\Lembur;

class FeeLemburController extends Controller
{
    public function index()
    {
        $data['list_lembur'] = Lembur::all();
        return view('_.admin.fee_lembur.index', $data);
    }

    public function create()
    {
    }

    public function edit($id)
    {
        return view('_.admin.fee_lembur.edit', [
            'lembur' => Lembur::findOrFail($id)
        ]);
    }

    public function update($id)
    {
        $lembur = Lembur::find($id);
        if (request('nominal')) $lembur->nominal = request('nominal');
        $lembur->save();

        return redirect('admin/potongan-tunjangan%Lembur')->with('success', 'Data Berhasil Diedit');
    }

    public function store()
    {
        $fee_lembur = new Lembur();
        $fee_lembur->nominal = request('nominal');
        $fee_lembur->save();

        return redirect('admin/potongan-tunjangan%Lembur')->with('success', 'Data Berhasil Ditambah');
    }

    function destroy($id)
    {
        $lembur = Lembur::find($id);
        $lembur->delete();
        return redirect('admin/potongan-tunjangan%Lembur')->with('success', 'Berhasil Dihapus');
    }
}
