<x-template.admin title="Daftar Gaji {{$gaji->nama_pegawai}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach (['success', 'warning', 'danger'] as $status)
                @if (session($status))
                <div class="alert alert-{{ $status }} alert-dismissible fade show custom-{{ $status }}-box" role="alert">
                    <strong>{{ session($status) }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <button onclick="history.go(-1);" class="btn btn-dark mb-3 font-bold"><i class="bi bi-arrow-bar-left"></i> Kembali</button>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Daftar Gaji</h5>
                            </div>
                            <hr>
                            <div class="row">
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
                                            <?php $potongan = $gaji->alpha * $alpha ?>
                                            <?php $lembur = $gaji->lembur * $fee_lembur ?>
                                            <div class="col-md-6">
                                                <dt class="">NAMA PEGAWAI</dt>
                                                <dd>{{ $gaji->nama_pegawai }}</dd>
                                            </div>
                                            <div class="col-md-6">
                                                <dt class="font-weight-bold">JABATAN</dt>
                                                <dd> {{ $gaji->jabatan }}</dd>
                                            </div>
                                            <div class="col-md-6">
                                                <dt class="font-weight-bold">GAJI POKOK</dt>
                                                <dd>Rp. {{number_format($gaji->gapok)}}</dd>
                                            </div>
                                            <div class="col-md-6">
                                                <dt class="font-weight-bold">POTONGAN</dt>
                                                <dd>Rp. {{number_format($potongan + $bpjs)}}</dd>
                                            </div>
                                            <div class="col-md-6">
                                                <dt class="font-weight-bold">FEE LEMBUR</dt>
                                                <dd>Rp. {{number_format($lembur)}}</dd>
                                            </div>
                                            <div class="col-md-6">
                                                <dt class="font-weight-bold">TUNJANGAN</dt>
                                                <dd>Rp. {{number_format($gaji->nominal + $gaji->nominal1)}}</dd>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Tambah Tunjangan</h5>
                            </div>
                            <hr>
                            <form action="{{ url('admin/data-absensi', $gaji->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="mb-2">Tunjangan</label>
                                            <select class="form-select mb-3 form-control" name="tunjangan">
                                                <option selected="selected" value="{{ $gaji->nominal }}">Rp. {{number_format($gaji->nominal) }}</option>
                                                @foreach ($tunjangan as $t)
                                                </option>
                                                <option value="{{ $t->nominal }}">{{ $t->nama_tunjangan }} - Rp. {{number_format($t->nominal)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="mb-4"></label>
                                            <select class="form-select mb-3 form-control" name="tunjangan1">
                                                <option selected="selected" value="{{ $gaji->nominal1 }}"> Rp. {{number_format($gaji->nominal1) }} </option>
                                                @foreach ($tunjangan as $t)
                                                </option>
                                                <option value="{{ $t->nominal }}">{{ $t->nama_tunjangan }} - Rp. {{number_format($t->nominal)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" style="font-weight: bold;">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.admin>