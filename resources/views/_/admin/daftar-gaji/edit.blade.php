<x-template.admin title="Daftar Gaji">
    <div class="container">
        <?php
        $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : '';
        ?>
        <a href="<?= $url ?>" class="btn btn-dark mb-3"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
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
                            <form action="{{ url('admin/data-pegawai') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tunjangan</label>
                                            <div class="form-group">
                                                <select class="custom-select custom-select-lg mb-3 form-control" value="" name="divisi" required>
                                                    <option selected> ------ Pilih Opsi ------ </option>
                                                    <option value="1">HRD & GA</option>
                                                    <option value="2">Finance</option>
                                                    <option value="3">Sales & marketing</option>
                                                    <option value="4">Network & Technical</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.admin>