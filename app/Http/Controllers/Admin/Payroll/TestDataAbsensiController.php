<?php

namespace App\Http\Controllers\Admin\Payroll;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DataPegawai;
use App\Models\Payroll\DaftarGaji;
use App\Models\Jabatan;
use App\Models\Payroll\TestDataAbsensi;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class TestDataAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }

        $data['list_dataabsensi'] = TestDataAbsensi::where('bulan', '=', $bulantahun)->get();
        return view('_.admin.test-data-absensi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_pegawai'] = DataPegawai::all();
        return view('_.admin.test-data-absensi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->input('submit') == 'submit') {
            $post = $request->all();

            $simpan = new TestDataAbsensi();
            $simpan = [];
            foreach ($post['bulan'] as $key => $value) {
                if ($post['bulan'][$key] != '' || $post['nik'][$key] != '') {
                    $simpan[] = [
                        'bulan'         => $post['bulan'][$key],
                        'nik'            => $post['nik'][$key],
                        'nama_pegawai'  => $post['nama_pegawai'][$key],
                        'jabatan'  => $post['nama_jabatan'][$key],
                        'gapok'  => $post['gapok'][$key],
                        'hadir'         => $post['hadir'][$key],
                        'sakit'         => $post['sakit'][$key],
                        'alpha'         => $post['alpha'][$key],
                        'lembur'         => $post['lembur'][$key],
                    ];
                }
            }
            TestDataAbsensi::insert($simpan);
            session()->flash('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            return redirect('admin/data-absensi');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarGaji $daftarGaji)
    {
        $data['daftarGaji'] = $daftarGaji;
        $data['list_pegawai'] = DataPegawai::all();
        $data['list_jabatan'] = Jabatan::all();
        return view('_.admin.daftar-gaji.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarGaji $DaftarGaji)
    {
        $data['slipGaji'] = $DaftarGaji;
        $data['list_pegawai'] = DataPegawai::all();
        return view('_.admin.slip-gaji.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $gaji = TestDataAbsensi::find($id);
        if (request('tunjangan')) $gaji->nominal = request('tunjangan');
        if (request('tunjangan1')) $gaji->nominal1 = request('tunjangan1');
        $gaji->save();


        return redirect()->back()->with('success', 'Berhasil Menambahkan Tunjangan, Tekan Tombol Kembali 2X Untuk Kembali Kehalaman Awal!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function inputAbsensi(Request $request)
    {
        if ($request->input('submit') == 'submit') {
            $post = $request->all();

            $simpan = [];
            foreach ($post['bulan'] as $key => $value) {
                if ($post['bulan'][$key] != '' || $post['nik'][$key] != '') {
                    $simpan[] = [
                        'bulan'         => $post['bulan'][$key],
                        'nama_pegawai'  => $post['nama_pegawai'][$key],
                        'nama_jabatan'  => $post['nama_jabatan'][$key],
                        'hadir'         => $post['hadir'][$key],
                        'sakit'         => $post['sakit'][$key],
                        'alpha'         => $post['alpha'][$key],
                        'nominal'       => $post['nominal'][$key],
                    ];
                }
            }
            TestDataAbsensi::insert($simpan);
            session()->flash('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            return redirect('admin/data_absensi');
        }


        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));
        $bulantahun = $bulan . $tahun;

        $data['input_absensi'] = DataPegawai::select('datapegawai.*', 'jabatan.nama_jabatan')
            ->join('data_jabatan', 'data_pegawai.jabatan', '=', 'data_jabatan.nama_jabatan')
            ->whereNotExists(function ($query) use ($bulantahun) {
                $query->select(DB::raw(1))
                    ->from('data_kehadiran')
                    ->whereRaw("bulan = '$bulantahun' AND data_pegawai.nik = data_kehadiran.nik");
            })
            ->orderBy('data_pegawai.nama_pegawai', 'ASC')
            ->get();

        return view('_.admin.data-absensi.index', $data);
    }
}
