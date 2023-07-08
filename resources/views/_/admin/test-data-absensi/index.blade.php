<x-template.admin title="Test Data Absensi">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-6">
                            <h5 class="card-title">Test Data Absensi</h5>
                        </div>
                        <div class="card-title bg-primary text-white">
                            Filter Data Absensi Pegawai
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
                                <div class="col-md-3 mt-4 float-right">
                                    <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                                    <a href="{{url('admin/data-absensi/create')}}" class="btn btn-success mb-2 ml-3"><i class="fas fa-plus"></i> Input Kehadiran</a>
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
                    <?php
                    $jml_data = count($list_dataabsensi);
                    if ($jml_data > 0) { ?>
                        <div class="container-fluid">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <td class="text-center">No</td>
                                                    <td class="text-center">Nama Pegawai</td>
                                                    <td class="text-center">Jabatan</td>
                                                    <td class="text-center" width="8%">Hadir</td>
                                                    <td class="text-center" width="8%">Sakit</td>
                                                    <td class="text-center" width="8%">Alpha</td>
                                                    <td class="text-center" width="8%">Lembur</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                ?>
                                                @foreach ($list_dataabsensi as $a)
                                                <tr>
                                                    <td class="text-center">{{$no++}}</td>
                                                    <td class="text-center">{{$a->nama_pegawai}}</td>
                                                    <td class="text-center">{{$a->jabatan}}</td>
                                                    <td class="text-center">{{$a->hadir}} Hari</td>
                                                    <td class="text-center">{{$a->sakit}} Hari</td>
                                                    <td class="text-center">{{$a->alpha}} Hari</td>
                                                    <td class="text-center">{{$a->lembur}} Jam</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <span class="badge bg-danger"><i class="fas fa-info-circle"></i> Data masih kosong, silakan input data kehadiran pada bulan dan tahun yang anda pilih</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</x-template.admin>