<!DOCTYPE html>
<html>

<head>
    <title>Cetak Daftar Gaji</title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
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
    <table>
        <tr>
            <td> Bulan</td>
            <td>:</td>
            <td><?php echo $bulan ?></td>
        </tr>
        <tr>
            <td> Tahun</td>
            <td>:</td>
            <td><?php echo $tahun ?></td>
        </tr>
    </table>
    <br>
    <table class="table table-bordered table-container">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Pegawai</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Gaji Pokok</th>
                <th class="text-center">Potongan</th>
                <th class="text-center">Fee Lembur</th>
                <th class="text-center">Tunjangan</th>
                <th class="text-center">Total</th>
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
                        <tr style="text-align: center; text-justify: auto;">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$gaji->nama_pegawai}}</td>
                            <td>{{$gaji->jabatan}}</td>
                            <td>Rp. {{number_format($gaji->gapok)}}</td>
                            <td>Rp. {{number_format($potongan + $bpjs)}}</td>
                            <td>Rp. {{number_format($lembur)}}</td>
                            <td>Rp. {{number_format($gaji->nominal + $gaji->nominal1)}}</td>
                            <td>Rp. {{number_format($gaji->gapok + $lembur - $potongan - $bpjs + $gaji->nominal + $gaji->nominal1)}}</td>
                        </tr>
                        @endforeach
                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <p>Ketapang, <?php echo date("d M Y") ?> <br> Finance</p>
                <br>
                <br>
                <p>_____________________</p>
            </td>
        </tr>
    </table>
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