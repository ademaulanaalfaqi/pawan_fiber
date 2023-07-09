<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IzinCuti;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $data ['baru'] = IzinCuti::where('status', '1')->count();
        $data ['diterima'] = IzinCuti::where('status', '2')->count();
        $data ['ditolak'] = IzinCuti::where('status', '3')->count();
        $data ['total'] = IzinCuti::count();
        $data ['total_pengajuan'] = IzinCuti::where('status', '1')->count();
        $data ['list_izincuti'] = IzinCuti::all();
        return view('_.admin.dashboard', $data);
    }
}
