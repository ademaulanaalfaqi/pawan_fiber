<x-template.admin title="Edit Data Pegawai">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('admin/datapegawai') }}" class="btn btn-dark "><i class="fas fa-arrow-left">
                    </i> Kembali</a>
                <div class="card mt-2">
                    <div class="card-header">
                        <strong> Edit Data Pegawai</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/datapegawai', $datapegawai->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="">NIK</label>
                                        <input type="text" class="form-control" name="nik"
                                            value="{{ $datapegawai->nik }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $datapegawai->nama }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <label for="">Divisi</label>
                                    <div class="form-grup">
                                        <select class="custom-select custom-select-lg mb-3 form-control" name="divisi"
                                            value="{{ $datapegawai->divisi }}">
                                            <option selected> ------ Pilih Opsi ------ </option>
                                            <option selected>{{ $datapegawai->divisi }}</option>
                                            <option value="1">ADMINISTRASI</option>
                                            <option value="2">PEGAWAI</option>
                                            <option value="3">OFFICE BOY</option>
                                            <option value="4">TEKNISI</option>
                                            <option value="5">KEUANGAN</option>
                                            <option value="6">SECURITY</option>
                                            <option value="7">HRD</option>
                                            <option value="8">MARKETING</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Jabatan</label>
                                    <div class="form-grup">
                                        <select class="custom-select custom-select-lg mb-3 form-control"
                                            name="jabatan"value="{{ $datapegawai->jabatan }}">
                                            <option selected> ------ Pilih Opsi ------ </option>
                                            <option selected>{{ $datapegawai->jabatan }}</option>
                                            <option value="1">HRD</option>
                                            <option value="2">DIREKTUR</option>
                                            <option value="3">BENDAHARA</option>
                                            <option value="4">SEKRETARIS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Status Kerja </label>
                                    <div class="form-grup">
                                        <select class="custom-select custom-select-lg mb-3 form-control" name="status_kerja"
                                            value="{{ $datapegawai->status_kerja }}">
                                            <option selected> ------ Pilih Opsi ------ </option>
                                            <option selected>{{ $datapegawai->status_kerja }}</option>
                                            <option value="1">Tetap </option>
                                            <option value="2">Kontrak</option>
                                            <option value="3">Magang/Training</option>
                                            <option value="4">Freelance/Partime</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Jam Kerja</label>
                                    <div class="form-grup">
                                        <select class="custom-select custom-select-lg mb-3 form-control" name="jam_kerja"
                                            value="{{ $datapegawai->jam_kerja }}">
                                            <option selected> ------ Pilih Opsi ------ </option>
                                            <option selected>{{ $datapegawai->jam_kerja }}</option>
                                            <option value="1">Senin - Jumat </option>
                                            <option value="2">Senin - Sabtu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label for="">Gaji Pokok</label>
                                        <div class="input-group">
                                            <div class="input-group-addon bg-white">Rp.</div>
                                            <input class="form-control" type="text" name="gaji_pokok"
                                                value="{{ $datapegawai->gaji_pokok }}">
                                            <div class="input-group-addon bg-white">.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-grup">
                                        <label for="">Jatah Cuti / Tahun</label>
                                        <input type="text" class="form-control" name="jatah_cuti"
                                            value="{{ $datapegawai->jatah_cuti }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-grup">
                                        <label for="">Tanggal Mulai Kerja</label>
                                        <input type="date" class="form-control" name="tanggal_masuk"
                                            value="{{ $datapegawai->tanggal_masuk }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-grup">
                                        <label for="">Tanggal Berakhir</label>
                                        <input type="date" class="form-control"
                                            name="tanggal_berakhir" value="{{ $datapegawai->tanggal_berakhir }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label>Jenis Kelamin</label>
                                    <div class="form-grup">
                                        <select class="custom-select custom-select-lg mb-3 form-control"
                                            name="jenis_kelamin" value="{{ $datapegawai->jenis_kelamin }}">
                                            <option selected> ------ Pilih Opsi ------ </option>
                                            <option selected>{{ $datapegawai->jenis_kelamin }} </option>
                                            <option value="1">Laki-Laki </option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-grup">
                                        <label for="">Nomor Handphone</label>
                                        <input type="text" class="form-control" name="no_handphone"
                                            value="{{ $datapegawai->no_handphone }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-grup">
                                        <label for="">Foto</label>
                                        <input type="file" class="form-control" name="foto"
                                            accept=".jpeg, .jpg, .png"value="{{ $datapegawai->foto }}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <strong>Akun</strong>
                            <hr>
                            <div class="row">
                                <div class="col-md 6">
                                    <div class="form-grup">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $datapegawai->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grup">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success float-right mt-3"> <i class="fa fa-save"></i>
                                Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.admin>