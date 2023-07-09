<x-template.admin title="Info Data Pegawai">
    <div class="container-fluid">
        <a href="{{ url('admin/data-pegawai') }}" class="btn btn-dark mb-3"><i class="bi bi-arrow-bar-left">
            </i> Kembali</a>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body " style="height: 250px; display: flex; justify-content: center">
                        <img style="height: 100%; padding-top:5%; " src="{{ url("public/$datapegawai->foto") }}"
                            alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Data Pegawai</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Nama</strong></label>
                                    <p class="form-control-static col-md-8">{{ $datapegawai->nama }}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>NIK</strong></label>
                                    <p class="form-control-static col-md-8">{{ $datapegawai->nik }}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Tanggal
                                            Lahir</strong></label>
                                    <p class="form-control-static col-md-8">{{ $datapegawai->tanggal_lahir }}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Alamat</strong></label>
                                    <p class="form-control-static col-md-8">{{ $datapegawai->alamat }}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Jenis
                                            Kelamin</strong></label>
                                    <p class="form-control-static col-md-8">{{ $datapegawai->jenis_kelamin }}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Email</strong></label>
                                    <p class="form-control-static col-md-8">{{ $datapegawai->email }}</p>
                                </div>
                                <div class="row">
                                    <label for=""
                                        class="control-label col-md-4"><strong>Telepon</strong></label>
                                    <p class="form-control-static col-md-8">{{ $datapegawai->no_handphone }}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Divisi</strong></label>
                                    <p class="form-control-static col-md-8">{{ $datapegawai->divisi }}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Jabatan</strong></label>
                                    <p class="form-control-static col-md-8">{{ $datapegawai->jabatan->nama_jabatan }}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Status
                                            Kerja</strong></label>
                                    <p class="form-control-static col-md-8">{{ $datapegawai->status_kerja }}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Tanggal
                                            Masuk</strong></label>
                                    <p class="form-control-static col-md-8">{{ $datapegawai->tanggal_masuk }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.admin>
