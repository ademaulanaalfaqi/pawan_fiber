<x-template.admin>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('admin/data-pegawai') }}" class="btn btn-dark "><i class="bi bi-arrow-bar-left">
                    </i> Kembali</a>
                <div class="card mt-2">
                    <div class="card-header">
                        <strong> Edit Data Pegawai</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/data-pegawai', $datapegawai->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NIK</label>
                                        <input type="text" class="form-control" value="{{ $datapegawai->nik }}"
                                            name="nik" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="form-control" value="{{ $datapegawai->nama }}"
                                            name="nama" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <div class="form-floating">

                                            <textarea class="form-control" id="alamat" name="alamat" value>{{ $datapegawai->alamat }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row  mt-3">
                                <div class="col-md-3">
                                    <label for="">Divisi</label>
                                    <div class="form-group">
                                        <select class="custom-select custom-select-lg mb-3 form-control"
                                            value="{{ $datapegawai->divisi }}" name="divisi" required>
                                            <option selected> ------ Pilih Opsi ------ </option>
                                            <option selected>{{ $datapegawai->divisi }}</option>
                                            @foreach ($list_divisi as $divisi)
                                                <option class="text-uppercase">
                                                    {{ $divisi->divisi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Jabatan</label>
                                    <div class="form-group">
                                        <select class="custom-select custom-select-lg mb-3 form-control"
                                            value="{{ $datapegawai->jabatan }}" name="jabatan" required>
                                            <option selected> ------ Pilih Opsi ------ </option>
                                            <option selected>{{ $datapegawai->jabatan->nama_jabatan }}</option>
                                            @foreach ($list_jabatan as $jabatan)
                                                <option class="text-uppercase">
                                                    {{ $jabatan->jabatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Status Kerja </label>
                                    <div class="form-group">
                                        <select class="custom-select custom-select-lg mb-3 form-control"
                                            value="{{ $datapegawai->status_kerja }}" name="status_kerja" required>
                                            <option selected> ------ Pilih Opsi ------ </option>
                                            <option selected>{{ $datapegawai->status_kerja }}</option>
                                            @foreach ($list_statuskerja as $statuskerja)
                                                <option class="text-uppercase">
                                                    {{ $statuskerja->statuskerja }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Hari Kerja</label>
                                    <div class="form-group">
                                        <select class="custom-select custom-select-lg mb-3 form-control"
                                            value="{{ $datapegawai->jam_kerja }}" name="jam_kerja" required>
                                            <option selected> ------ Pilih Opsi ------ </option>
                                            <option selected>{{ $datapegawai->jam_kerja }}</option>
                                            @foreach ($list_harikerja as $harikerja)
                                                <option class="text-uppercase">
                                                    {{ $harikerja->hari_kerja }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row  mt-3">
                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label for="">Gaji Pokok</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp.</span>
                                            <input class="form-control" type="text"
                                                value="{{ $datapegawai->gaji_pokok }}" name="gaji_pokok" required>
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Jatah Cuti / Tahun</label>
                                        <input type="text" class="form-control"
                                            value="{{ $datapegawai->jatah_cuti }}" name="jatah_cuti" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tanggal Mulai Kerja</label>
                                        <input type="date" class="form-control"
                                            value="{{ $datapegawai->tanggal_masuk }}" name="tanggal_masuk" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tanggal Berakhir</label>
                                        <input type="date" class="form-control"
                                            value="{{ $datapegawai->tanggal_berakhir }}" name="tanggal_berakhir"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row  mt-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control"
                                            value="{{ $datapegawai->tanggal_lahir }}" name="tanggal_lahir" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Jenis Kelamin</label>
                                    <div class="form-group">
                                        <select class="custom-select custom-select-lg mb-3 form-control"
                                            value="{{ $datapegawai->jenis_kelamin }}" name="jenis_kelamin" required>
                                            <option selected> ------ Pilih Opsi ------ </option>
                                            <option selected>{{ $datapegawai->jenis_kelamin }} </option>
                                            <option value="1">Laki-Laki </option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nomor Handphone</label>
                                        <input type="text" class="form-control"
                                            value="{{ $datapegawai->no_handphone }}" name="no_handphone" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="foto"
                                                accept=".jpeg, .jpg, .png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <strong>Akun</strong>
                            <hr>
                            <div class="row">
                                <div class="col-md 6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" value="{{ $datapegawai->email }}"
                                            name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary float-end mt-3"><i class="bi bi-save2"></i>
                                Simpan</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.admin>
