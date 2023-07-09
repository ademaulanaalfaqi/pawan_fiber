<x-template.admin title="Daftar Gaji">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Daftar Gaji</h5>
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
                                    <div class="col-md-8 mt-4">
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
                                        <button type="button" class="btn btn-dark mb-2 ml-3 float-end m-1" style="font-weight: bold;" onclick="location.reload()"><i class="bi bi-arrow-clockwise"></i> Refresh</button>
                                        <?php if (count($gaji) > 0) { ?>
                                            <a href="{{ route('admin.daftar-gaji.cetak-data', ['bulan' => $bulan, 'tahun' => $tahun]) }}" target="_blank" class=" btn btn-success mb-2 ml-3 float-end m-1" style="font-weight: bold;"><i class="bi bi-printer-fill"></i> Cetak Data</a>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-success mb-2 ml-3 float-end m-1" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-weight: bold;">
                                                <i class="bi bi-printer-fill"></i> Cetak Data</button>
                                        <?php } ?>
                                        <button type="submit" class="btn btn-primary mb-2 float-end m-1" style="font-weight: bold;"><i class="bi bi-eye-fill"></i> Tampilkan Data</button>
                                    </div>
                                    <div class="col-md-8">
                                    </div>
                                </div>
                                <hr>
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
                            </form>
                        </div>
                        <div class="alert alert-info alert-dismissible fade show">
                            Menampilkan Daftar Gaji Bulan: <span style="font-weight: bold;"><?php echo $bulan ?></span> Tahun: <span style="font-weight: bold;"><?php echo $tahun ?></span>
                        </div>
                        <hr>
                        <?php
                        $jml_data = count($gaji);
                        if ($jml_data > 0) { ?>
                            <div class="table-responsive">
                                <table class="datatable">
                                    <thead>
                                        <tr class="bg-dark" style="color: white; text-align: center; ">
                                            <th>Nama Pegawai</th>
                                            <th>Jabatan</th>
                                            <th>Gaji Pokok</th>
                                            <th>Potongan</th>
                                            <th>Fee Lembur</th>
                                            <th>Tunjangan</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($potongan as $p) : {
                                                $alpha = $p->nominal;
                                            } ?>
                                            <?php foreach ($bpjs as $bp) : {
                                                    $fee_bpjs = $bp->nominal;
                                                } ?>
                                                <?php foreach ($fee_lembur as $l) : {
                                                        $fee_lembur = $l->nominal;
                                                    } ?>
                                                    @foreach ($gaji as $gaji)
                                                    <?php $bpjs = $gaji->gapok * $fee_bpjs ?>
                                                    <?php $lembur = $gaji->lembur * $fee_lembur ?>
                                                    <?php $potongan = $gaji->alpha * $alpha ?>
                                                    <tr style="text-align: center; text-justify: center;">
                                                        <td>{{$gaji->nama_pegawai}}</td>
                                                        <td>{{$gaji->jabatan}}</td>
                                                        <td>Rp. {{number_format($gaji->gapok)}}</td>
                                                        <td>Rp. {{number_format($potongan + $bpjs)}}</td>
                                                        <td>Rp. {{number_format($lembur)}}</td>
                                                        <td>Rp. {{number_format($gaji->nominal + $gaji->nominal1)}}</td>
                                                        <td>Rp. {{number_format($gaji->gapok + $lembur - $potongan - $bpjs + $gaji->nominal + $gaji->nominal1)}}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a type="button" href="{{ url('admin/daftar-gaji', $gaji->id) }}" class="btn btn-outline-warning"><i class="bi bi-gear-fill"></i></a>
                                                                <a type="button" href="{{ route('admin.daftar-gaji.cetak-perorang', $gaji->id) }}" target="_blank" class="btn btn-outline-success"><i class="bi bi-printer-fill"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else { ?>
                            <h5><span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Data masih kosong, silakan input data kehadiran pada bulan dan tahun yang anda pilih</span></h5>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Informasi</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Daftar gaji masih kosong, silahkan input absensi terlebih dahulu pada bulan dan tahun yang Anda pilih.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</x-template.admin>

@push ('script')
<script>
    $('#data-table').DataTable();
</script>
@endpush