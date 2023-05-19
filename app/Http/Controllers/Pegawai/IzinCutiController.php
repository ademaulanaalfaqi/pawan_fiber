<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\IzinCuti;
use Illuminate\Http\Request;

class IzinCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id_user = request()->user()->id;
        // $data ['list_izin'] = IzinCuti::where('id_user', $id_user)->get();
        $data ['list_izincuti'] = IzinCuti::all();
        return view('_.pegawai.izin-cuti.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['pegawai'] = $pegawai = auth()->guard('pegawai')->user();
        return view('_.pegawai.izin-cuti.create', $data);
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
        $izincuti->status = 1;
        $izincuti->id_user = request()->user()->id;
        $izincuti->tanggal_mulai = request('tanggal_mulai');
        $izincuti->tanggal_selesai = request('tanggal_selesai');
        $izincuti->tipe_izin = request('tipe_izin');
        $izincuti->keterangan = request('keterangan');
        $izincuti->foto = request('foto');
        $izincuti->save();

        $izincuti->handleUploadFoto();

        return redirect('pegawai/izin-cuti');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(IzinCuti $izincuti)
    {
        $data ['list_izin'] = IzinCuti::where('id',$izincuti)->get();
        $data ['izincuti'] = $izincuti;
        return view('_.pegawai.izin-cuti.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(IzinCuti $izincuti)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IzinCuti $izincuti)
    {
        $izincuti->tanggal_mulai = request('tanggal_mulai');
        $izincuti->tanggal_selesai = request('tanggal_selesai');
        $izincuti->tipe_izin = request('tipe_izin');
        $izincuti->keterangan = request('keterangan');
        if(request('foto')) $izincuti->handleUploadFoto();
        $izincuti->save();

        return redirect('pegawai/izin-cuti');
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
