<x-template.pegawai>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('pegawai/profil') }}" class="btn btn-dark mb-2"><i class="bi bi-arrow-bar-left">
                    </i> Kembali</a>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Data Profile</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('pegawai/profil', $datapegawai->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $datapegawai->nama }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" value="{{ $datapegawai->email }}"
                                            name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nomor Handphone</label>
                                        <input type="text" class="form-control" name="no_handphone"
                                            value="{{ $datapegawai->no_handphone }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label>Alamat Rumah </label>
                                    <div class="form-floating">

                                        <textarea class="form-control" id="alamat" name="alamat" value>{{ $datapegawai->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-end mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.pegawai>
