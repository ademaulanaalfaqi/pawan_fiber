<!DOCTYPE html>
<html>

<head>
    <title>Daftar Gaji {{ $gaji->nama_pegawai }}</title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
        }

        .table-container {
            margin: 20px;
        }
    </style>
    <!-- Vendor CSS Files -->
    <link href="{{url('public')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('public')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{url('public')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{url('public')}}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{url('public')}}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{url('public')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{url('public')}}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

</head>

<body>
    <center>
        <img class="mb-3 mt-3" src="{{ url('public') }}/assets/img/pf.png" alt="" height="100" width="240">
        <h3>Daftar Gaji Pegawai</h3>
        <hr style="width: 50%; border-width: 5px; color: black">
    </center>

    <?php foreach ($potongan as $p) : {
            $alpha = $p->nominal;
        } ?>
        <?php foreach ($bpjs as $bp) : {
                $fee_bpjs = $bp->nominal;
            } ?>
            <?php foreach ($fee_lembur as $l) : {
                    $fee_lembur = $l->nominal;
                } ?>
                <?php $bpjs = $gaji->gapok * $fee_bpjs ?>
                <?php $lembur = $gaji->lembur * $fee_lembur ?>
                <?php $potongan = $gaji->alpha * $alpha ?>
                <table style="width: 100%">
                    <tr>
                        <td width="20%" class="ml-3">&nbsp;&nbsp;&nbsp; Nama Pegawai</td>
                        <td width="2%">:</td>
                        <td>{{$gaji->nama_pegawai}}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp; Jabatan</td>
                        <td>:</td>
                        <td>{{$gaji->jabatan}}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp; NIK</td>
                        <td>:</td>
                        <td>{{$gaji->nik}}</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp; Bulan</td>
                        <td>:</td>
                        <td><?php echo substr($gaji->bulan, 0, 2) ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp; Tahun</td>
                        <td>:</td>
                        <td><?php echo substr($gaji->bulan, 2, 4) ?></td>
                    </tr>
                </table>

                <div class="table-container">
                    <table class="table table-striped table-bordered mt-4">
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Jumlah</th>
                        </tr>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Gaji Pokok</td>
                            <td>Rp. {{number_format($gaji->gapok)}}</td>
                        </tr>

                        <tr>
                            <td class="text-center">2</td>
                            <td>Potongan</td>
                            <td>Rp. {{number_format($potongan + $bpjs)}}</td>
                        </tr>

                        <tr>
                            <td class="text-center">3</td>
                            <td>Fee Lembur</td>
                            <td>Rp. {{number_format($lembur)}}</td>
                        </tr>

                        <tr>
                            <td class="text-center">4</td>
                            <td>Tunjangan</td>
                            <td>Rp. {{number_format($gaji->nominal)}}</td>
                        </tr>

                        <tr>
                            <th colspan="2" style="text-align: right;">Total Gaji : </th>
                            <th>Rp. {{number_format($gaji->gapok + $lembur - $potongan - $bpjs + $gaji->nominal)}}</th>
                        </tr>
                    </table>
                </div>

                <table width="100%">
                    <tr>
                        <td></td>
                        <td>
                            <p>&nbsp;&nbsp;&nbsp; Pegawai</p>
                            <br>
                            <br>
                            <p class="font-weight-bold">&nbsp;&nbsp;&nbsp; <?php echo $gaji->nama_pegawai ?></p>
                        </td>

                        <td width="200px">
                            <p>Ketapang, <?php echo date("d M Y") ?> <br> Finance,</p>
                            <br>
                            <br>
                            <p>___________________</p>
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
</body>

</html>
<script>
    window.print();
</script>
<script src="{{url('public')}}/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="{{url('public')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('public')}}/assets/vendor/chart.js/chart.umd.js"></script>
<script src="{{url('public')}}/assets/vendor/echarts/echarts.min.js"></script>
<script src="{{url('public')}}/assets/vendor/quill/quill.min.js"></script>
<script src="{{url('public')}}/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="{{url('public')}}/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="{{url('public')}}/assets/vendor/php-email-form/validate.js"></script>