<x-template.pegawai>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('pegawai/profil') }}" class="btn btn-dark mb-2"><i class="bi bi-arrow-bar-left">
                    </i> Kembali</a>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Data Keluarga</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('pegawai/profil/editkeluarga', $datakeluarga->id) }} " method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $datakeluarga->nama }} ">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir"
                                            value="{{ $datakeluarga->tempat_lahir }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nomor Handphone</label>
                                        <input type="text" class="form-control"
                                            value="{{ $datakeluarga->no_telepon }}" name="no_telepon">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Pekerjaan</label>
                                        <input type="text" class="form-control"
                                            value="{{ $datakeluarga->pekerjaan }} " name="pekerjaan">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Kewarganegaraan</label>
                                        <select class="form-control" name="kewarganegaraan" id="">

                                            <option class="text-uppercase"
                                                value="{{ $datakeluarga->kewarganegaraan }} ">

                                                {{ $datakeluarga->kewarganegaraan }}

                                            </option>
                                            <option class="text-uppercase" value="1">
                                                WNI</option>
                                            <option class="text-uppercase" value="2">
                                                WNA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control"
                                            value="{{ $datakeluarga->tanggal_lahir }}" name="tanggal_lahir" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" id="alamat" name="alamat" value>{{ $datakeluarga->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_user" value="{{ $datakeluarga->id_user }}" id="">
                            <button type="submit" class="btn btn-success float-end mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.pegawai>
