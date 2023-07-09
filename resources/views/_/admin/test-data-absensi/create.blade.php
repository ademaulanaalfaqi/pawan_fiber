<x-template.admin title="Test Data Absensi">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-6">
                            <h5 class="card-title">Test Data Absensi</h5>
                        </div>
                        <div class="card-header bg-primary text-white">
                            Input Absensi Pegawai
                        </div>
                        <form class="form-inline">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <label for="staticEmail2">Bulan</label>
                                        <select class="form-control ml-3" name="bulan">
                                            <option value=""> Pilih Bulan </option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2 ml-5">
                                        <label for="staticEmail2">Tahun</label>
                                        <select class="form-control ml-3" name="tahun">
                                            <option value=""> Pilih Tahun </option>
                                            <?php $tahun = date('Y');
                                            for ($i = 2020; $i < $tahun + 5; $i++) { ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Generate Form</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        $bulantahun = $bulan . $tahun;
                    } else {
                        $bulan = date('m');
                        $tahun = date('Y');
                        $bulantahun = $bulan . $tahun;
                    }
                    ?>
                    <div class="alert alert-info">
                        Menampilkan Data Kehadiran Pegawai Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
                    </div>
                    <form action="{{ url('admin/data-absensi') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button class="btn btn-success mb-3" type="submit" name="submit" value="submit">Simpan</button>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td class="text-center">No</td>
                                <td class="text-center">Nama Pegawai</td>
                                <td class="text-center">Jabatan</td>
                                <td class="text-center" width="8%">Hadir</td>
                                <td class="text-center" width="8%">Sakit</td>
                                <td class="text-center" width="8%">Alpha</td>
                                <td class="text-center" width="8%">Lembur</td>
                            </tr>
                            <?php $no = 1;
                            ?>
                            @foreach ($list_pegawai as $pegawai)
                            <tr>
                                <input type="hidden" name="bulan[]" class="form-control" value="<?php echo $bulantahun ?>">
                                <input type="hidden" name="nama_pegawai[]" class="form-control" value="{{$pegawai->nama}}">
                                <input type="hidden" name="nama_jabatan[]" class="form-control" value="{{$pegawai->jabatan->nama_jabatan}}">
                                <input type="hidden" name="gapok[]" class="form-control" value="{{$pegawai->jabatan->gapok}}">
                                <input type="hidden" name="nik[]" class="form-control" value="{{$pegawai->nik}}">
                                <input type="hidden" name="nominal[]" class="form-control" value="{{0}}">



                                <td><?php echo $no++ ?></td>
                                <td>{{$pegawai->nama}}</td>
                                <td>{{$pegawai->jabatan->nama_jabatan}}</td>
                                <td><input type="number" name="hadir[]" class="form-control" value="0"></td>
                                <td><input type="number" name="sakit[]" class="form-control" value="0"></td>
                                <td><input type="number" name="alpha[]" class="form-control" value="0"></td>
                                <td><input type="number" name="lembur[]" class="form-control" value="0"></td>
                            </tr>
                            @endforeach
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-template.admin>