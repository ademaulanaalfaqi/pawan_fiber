<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LokasiAbsensi;
use Illuminate\Http\Request;

class LokasiAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['list_lokasi_absensi'] = LokasiAbsensi::all();
        return view('_.admin.lokasi_absensi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('_.admin.lokasi_absensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lokasiabsensi = new LokasiAbsensi;
        $lokasiabsensi->lokasi = request('lokasi');
        $lokasiabsensi->latitude = request('latitude');
        $lokasiabsensi->longitude = request('longitude');
        $lokasiabsensi->radius = request('radius');
        $lokasiabsensi->save();

        return redirect('admin/lokasi_absensi');
    }

    /**
     * Display the specified resource.
     */
    public function show(LokasiAbsensi $lokasiabsensi)
    {
        $data ['lokasiabsensi'] = $lokasiabsensi;
        return view('_.admin.lokasi_absensi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LokasiAbsensi $lokasiabsensi)
    {
        $data ['lokasiabsensi'] = $lokasiabsensi;
        return view('_.admin.lokasi_absensi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LokasiAbsensi $lokasiabsensi)
    {
        $lokasiabsensi->lokasi = request('lokasi');
        $lokasiabsensi->latitude = request('latitude');
        $lokasiabsensi->longitude = request('longitude');
        $lokasiabsensi->radius = request('radius');
        $lokasiabsensi->save();

        return redirect('admin/lokasi_absensi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
