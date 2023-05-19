<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IzinCuti;
use Illuminate\Http\Request;

class IzinCutiController extends Controller
{
    public function index(){
        $data ['list_izincuti'] = IzinCuti::all();
        $data ['total_pengajuan'] = IzinCuti::where('status', '1')->count();
        return view('_.admin.izin-cuti.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data ['list_izincuti'] = IzinCuti::all();
        $data ['total_pengajuan'] = IzinCuti::where('status', '1')->count();
        return view('admin.izin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $izincuti = new IzinCuti();
        $izincuti->nama = request('nama');
        $izincuti->tanggal_pengajuan = request('tanggal_pengajuan');
        $izincuti->tanggal_mulai = request('tanggal_mulai');
        $izincuti->tanggal_selesai = request('tanggal_selesai');
        $izincuti->hari = request('hari');
        $izincuti->tipe_izin = request('tipe_izin');
        $izincuti->keterangan = request('keterangan');
        $izincuti->foto = request('foto');
        $izincuti->save();

        $izincuti->handleUploadFoto();

        return redirect('admin/izin');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(IzinCuti $izincuti)
    {
        $data ['list_izincuti'] = IzinCuti::all();
        $data ['total_pengajuan'] = IzinCuti::where('status', '1')->count();
        $data ['izincuti'] = $izincuti;
        return view('_.admin.izin-cuti.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function setuju(IzinCuti $izincuti)
    {
        $izincuti->status = 2;
        $izincuti->save();
        return back();
    }

    public function tolak(IzinCuti $izincuti)
    {
        $izincuti->status = 3;
        $izincuti->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
