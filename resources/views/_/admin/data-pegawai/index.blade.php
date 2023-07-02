<x-template.admin title="Data Pegawai Admin">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title"><strong>// Data Pegawai</strong></h5>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary float-end mt-3" data-bs-toggle="modal"
                                    data-bs-target="#ModalTambah">
                                    <i class="bi bi-plus-lg"></i> Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Aksi</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th class="text-uppercase">Divisi</th>
                                        <th>Jabatan</th>
                                        <th>Tanggal Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_datapegawai as $datapegawai)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('admin/data-pegawai', $datapegawai->id) }}"
                                                        class="btn btn-dark"><i class="bi bi-info"
                                                            data-feather="check-square"></i> Lihat
                                                    </a>

                                                    <a href="{{ url('admin/data-pegawai', $datapegawai->id) }}/edit"
                                                        class="btn btn-warning"><i class="bi bi-pencil-square"
                                                            data-feather="check-square"></i> Edit</a>
                                                    <x-button.delete
                                                        url="{{ url('admin/data-pegawai', $datapegawai->id) }}" />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="image" style="height: 50px;">
                                                    <img src="{{ url("public/$datapegawai->foto") }}"
                                                        style="height: 100%; border-radius:50%" alt="">
                                                </div>
                                            </td>
                                            <td>

                                                {{ $datapegawai->nama }}
                                            </td>


                                            <td>{{ $datapegawai->divisi }}</td>
                                            <td>{{ $datapegawai->jabatan }}</td>

                                            <td>{{ date('d F Y', strtotime($datapegawai->tanggal_masuk)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    {{-- Tambah Data --}}
    <div class="modal fade" id="ModalTambah" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/data-pegawai') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input type="text" class="form-control" name="nik" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label>Alamat</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="alamat"
                                        style="height: 100px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row  mt-3">
                            <div class="col-md-3">
                                <label for="">Divisi</label>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3 form-control" name="divisi"
                                        required>
                                        <option selected> ------ Pilih Opsi ------ </option>
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
                                    <select class="custom-select custom-select-lg mb-3 form-control" name="jabatan"
                                        required>
                                        <option selected> ------ Pilih Opsi ------ </option>
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
                                    <select class="custom-select custom-select-lg mb-3 form-control" name="status_kerja"
                                        required>
                                        <option selected> ------ Pilih Opsi ------ </option>
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
                                    <select class="custom-select custom-select-lg mb-3 form-control" name="jam_kerja"
                                        required>
                                        <option selected> ------ Pilih Opsi ------ </option>
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
                                        <span class="input-group-text">Rp</span>
                                        <input class="form-control" type="text" name="gaji_pokok" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Jatah Cuti / Tahun</label>
                                    <input type="text" class="form-control" name="jatah_cuti" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tanggal Mulai Kerja</label>
                                    <input type="date" class="form-control" name="tanggal_masuk" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" name="tanggal_berakhir" required>
                                </div>
                            </div>
                        </div>
                        <div class="row  mt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Jenis Kelamin</label>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3 form-control"
                                        name="jenis_kelamin" required>
                                        <option selected> ------ Pilih Opsi ------ </option>
                                        <option value="1">Laki-Laki </option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nomor Handphone</label>
                                    <input type="text" class="form-control" name="no_handphone" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="foto"
                                            accept=".jpeg, .jpg, .png" required>
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
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-template.admin>
