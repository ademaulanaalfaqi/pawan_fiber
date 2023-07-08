<x-template.pegawai title="Data Gaji">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Data Gaji</h5>
                            </div>
                        </div>
                        <table class="datatable ">
                            <thead>
                                <tr class="bg-dark" style="color: white; text-align: center;">
                                    <th>Bulan/Tahun</th>
                                    <th>Gaji Pokok</th>
                                    <th>Potongan</th>
                                    <th>Fee Lembur</th>
                                    <th>Tunjangan</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bpjs as $bp) : {
                                        $fee_bpjs = $bp->nominal;
                                    } ?>
                                    <?php foreach ($potongan as $p) : {
                                            $alpha = $p->nominal;
                                        } ?>
                                        <?php foreach ($fee_lembur as $l) : {
                                                $fee_lembur = $l->nominal;
                                            } ?>
                                            @foreach ($gaji as $gaji)
                                            <?php $bpjs = $gaji->gapok * $fee_bpjs ?>
                                            <?php $lembur = $gaji->lembur * $fee_lembur ?>
                                            <?php $potongan = $gaji->alpha * $alpha ?>
                                            <tr style="text-align: center; text-justify: auto;">
                                                <td>{{$gaji->bulan}}</td>
                                                <td>Rp. {{number_format($gaji->gapok)}}</td>
                                                <td>Rp. {{number_format($potongan + $bpjs)}}</td>
                                                <td>Rp. {{number_format($lembur)}}</td>
                                                <td>Rp. {{number_format($gaji->nominal)}}</td>
                                                <td>Rp. {{number_format($gaji->gapok + $lembur - $potongan - $bpjs + $gaji->nominal)}}</td>
                                                <td>
                                                    <a type="button" href="{{ route('pegawai.gaji.cetak-perorang', $gaji->id) }}" target="_blank" class="btn btn-outline-success"><i class="bi bi-printer-fill"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.pegawai>