<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Models\LokasiAbsensi;
use App\Http\Controllers\Controller;
use App\Models\DataPegawai;
use Carbon\Carbon;

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
        $location = LokasiAbsensi::first();
        $data ['latitude'] = $location->latitude;
        $data ['longitude'] = $location->longitude;
        return view('_.pegawai.absensi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function calculateDistance($latitude1, $longitude1, $latitude2, $longitude2)
    {

        $earthRadius = 6371; // Radius bumi dalam kilometer

        $latDiff = deg2rad($latitude2 - $latitude1);
        $lonDiff = deg2rad($longitude2 - $longitude1);

        $a = sin($latDiff / 2) * sin($latDiff / 2) +
            cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) *
            sin($lonDiff / 2) * sin($lonDiff / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c;

        return $distance;
    }

    public function store(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $lokasireferensi = LokasiAbsensi::all();

        $adayangmasukradius = false;

        foreach ($lokasireferensi as $lokasi) {
            $distance = $this->calculateDistance($latitude, $longitude, $lokasi->latitude, $lokasi->longitude);
            if ($distance <= $lokasi->radius) {
                $adayangmasukradius = true;
                break;
            }          
        }

        if ($adayangmasukradius) {
            $jamDatang = Carbon::now()->toTimeString();
            if (Carbon::parse($jamDatang)->lessThan('07:00:00')) {
                $absensi = new Absensi;
                $absensi->nama = request()->user()->nama;
                $absensi->id_user = request()->user()->id;  
                $absensi->latitude = request('latitude');
                $absensi->longitude = request('longitude');
                $absensi->istirahat = 1;
                $absensi->pulang = 1;
                $absensi->status = 1;
                $absensi->handleUploadFoto();
                $absensi->save();
                
                return redirect('pegawai/absensi')->with('success', 'Anda telah mengisi presensi hari ini');
            } elseif (Carbon::parse($jamDatang)->lessThan('08:00:00')) {
                $absensi = new Absensi;
                $absensi->nama = request()->user()->nama;
                $absensi->id_user = request()->user()->id;  
                $absensi->latitude = request('latitude');
                $absensi->longitude = request('longitude');
                $absensi->istirahat = 1;
                $absensi->pulang = 1;
                $absensi->status = 2;
                $absensi->handleUploadFoto();
                $absensi->save();
                
                return redirect('pegawai/absensi')->with('success', 'Anda telah mengisi presensi hari ini');
            } else {
                $absensi = new Absensi;
                $absensi->nama = request()->user()->nama;
                $absensi->id_user = request()->user()->id;  
                $absensi->latitude = request('latitude');
                $absensi->longitude = request('longitude');
                $absensi->istirahat = 1;
                $absensi->pulang = 1;
                $absensi->status = 3;
                $absensi->handleUploadFoto();
                $absensi->save();
                
                return redirect('pegawai/absensi')->with('success', 'Anda telah mengisi presensi hari ini');
            }
        } else {
            return back()->with('danger', 'Anda berada di luar radius lokasi absensi.');
        }  
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
