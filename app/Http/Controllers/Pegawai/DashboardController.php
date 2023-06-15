<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\IzinCuti;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $jumlahJatahIzin = request()->user()->jatah_cuti;
        $jumlahPengajuan = IzinCuti::where('id_user', request()->user()->id)
            ->whereYear('created_at', date('Y'))
            ->count();
        $data ['sisa_jatah'] = $jumlahJatahIzin - $jumlahPengajuan;

        $id_user = request()->user()->id;
        $data ['baru'] = IzinCuti::where('id_user', $id_user)->where('status', '1')->count();
        $data ['diterima'] = IzinCuti::where('id_user', $id_user)->where('status', '2')->count();
        $data ['ditolak'] = IzinCuti::where('id_user', $id_user)->where('status', '3')->count();
        $data ['total'] = IzinCuti::where('id_user', $id_user)->count();
        return view('_.pegawai.dashboard', $data);
    }
}
