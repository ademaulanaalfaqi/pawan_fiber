<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_user = request()->user()->id;
        $data ['list_absensi'] = Absensi::where('id_user', $id_user)->get();
        return view('_.pegawai.absensi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('_.pegawai.absensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $absensi = new Absensi;
        $absensi->nama = request()->user()->nama;
        $absensi->id_user = request()->user()->id;  
        $absensi->latitude = request('latitude');
        $absensi->longitude = request('longitude');
        $absensi->istirahat = 1;
        $absensi->pulang = 1;
        $absensi->handleUploadFoto();
        $absensi->save();

        return redirect('pegawai/absensi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        $data ['list_absensi'] = Absensi::where('id',$absensi)->get();
        $data ['absensi'] = $absensi;
        return view('_.pegawai.absensi.show', $data);
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

    public function istirahat(Absensi $absensi)
    {
        $absensi->istirahat = 2;
        $absensi->jam_istirahat = request('jam_istirahat');
        $absensi->save();
        return back();
    }

    public function pulang(Absensi $absensi)
    {
        $absensi->pulang = 2;
        $absensi->jam_pulang = request('jam_pulang');
        $absensi->save();
        return back();
    }
}
