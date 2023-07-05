<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IzinCuti;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['total_pengajuan'] = IzinCuti::where('status', '1')->count();
        $data ['list_izincuti'] = IzinCuti::all();
        $data ['hari_ini'] = Carbon::today()->format('d F Y');
        $data ['list_absensi'] = Absensi::whereDate('created_at', '=', Carbon::today()->toDateString())->get();

        if (request('tanggal')) {
            $tanggal = request('tanggal');
            $data ['list_absensi'] = Absensi::whereDate('created_at', $tanggal)->get();
        }

        return view('_.admin.absensi.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        $data ['list_izin'] = IzinCuti::all();
        $data ['total_pengajuan'] = IzinCuti::where('status', '1')->count();
        $data ['list_absensi'] = Absensi::where('id',$absensi)->get();
        $data ['absensi'] = $absensi;
        return view('_.admin.absensi.show', $data);
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
}
