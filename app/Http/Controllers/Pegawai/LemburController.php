<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Lembur;
use App\Models\IzinCuti;
use Illuminate\Http\Request;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['list_izin'] = IzinCuti::all();
        $id_user = request()->user()->id;
        $data ['list_lembur'] = Lembur::where('id_user',$id_user)->get();
        return view('_.pegawai.lembur.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lembur = new Lembur;
        $lembur->id_user = request()->user()->id;
        $lembur->nama = request()->user()->nama;
        $lembur->aktifitas = request('aktifitas');
        $lembur->lembur = 1;
        $lembur->save();

        return redirect('pegawai/lembur');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lembur $lembur)
    {
        $data ['lembur'] = $lembur;
        return view('_.pegawai.lembur.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function selesai(Lembur $lembur)
    {
        $lembur->lembur = 2;
        $lembur->selesai = request('selesai');
        $lembur->save();

        return back();
    }
}
