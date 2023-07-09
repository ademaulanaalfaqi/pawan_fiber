<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dinas;
use App\Models\IzinCuti;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['list_izin'] = IzinCuti::all();
        $data ['total_pengajuan'] = IzinCuti::where('status', '1')->count();
        $data ['list_dinas'] = Dinas::all();
        return view('_.admin.dinas.index', $data);
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

    public function show(Dinas $dinas)
    {
        $data ['list_izin'] = IzinCuti::all();
        $data ['total_pengajuan'] = IzinCuti::where('status', '1')->count();
        $data ['list_dinas'] = Dinas::where('id', $dinas)->get();
        $data ['dinas'] = $dinas;
        return view('_.admin.dinas.show', $data);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }



    
    function destroy(Dinas $dinas){
        $dinas->delete();
        // return $dinas;
        return redirect('admin/dinas')->with('success', 'Data Berhasil Dihapus');
    }
}
