<x-template.admin title="Data Pegawai Admin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title"><strong>// Data Pegawai</strong></h5>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-success float-end mt-3" data-bs-toggle="modal"
                                    data-bs-target="#ModalTambah">Tambah Data
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
                                                        class="btn btn-dark">Lihat
                                                    </a>

                                                    <a href="{{ url('admin/data-pegawai', $datapegawai->id) }}/edit"
                                                        class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#ModalEdit{{$datapegawai->id}}">Edit</a>
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
                                            <td>{{ $datapegawai->jabatan->nama_jabatan }}</td>

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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input type="number" class="form-control" name="nik" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" required>
                                </div>
                            </div>
                        </div>
                        <div class="row  mt-3">
                            <div class="col-md-3">
                                <label for="">Divisi</label>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3 form-control" name="divisi" required>
                                        <option selected> ------ Pilih Opsi ------ </option>
                                        @foreach ($list_divisi as $divisi)
                                            <option value="{{$divisi->divisi}}">
                                                {{ $divisi->divisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Jabatan</label>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3 form-control" name="id_jabatan" required>
                                        <option selected> ------ Pilih Opsi ------ </option>
                                        @foreach ($list_jabatan as $jabatan)
                                        <option value="{{ $jabatan->id }}">
                                            {{ $jabatan->nama_jabatan }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Status Kerja </label>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3 form-control" name="status_kerja" required>
                                        <option selected> ------ Pilih Opsi ------ </option>
                                        @foreach ($list_statuskerja as $statuskerja)
                                            <option value="{{ $statuskerja->statuskerja }}">
                                                {{ $statuskerja->statuskerja }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Hari Kerja</label>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3 form-control" name="hari_kerja" required>
                                        <option selected> ------ Pilih Opsi ------ </option>
                                        @foreach ($list_harikerja as $harikerja)
                                            <option value="{{ $harikerja->hari_kerja }}">
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
                                    <select class="custom-select custom-select-lg mb-3 form-control" name="jenis_kelamin" required>
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
                                        <input type="file" class="form-control" name="foto" accept=".jpeg, .jpg, .png" required>
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
    @foreach ($list_datapegawai as $datapegawai)
    {{-- Edit Data --}}
    <div class="modal fade" id="ModalEdit{{$datapegawai->id}}" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/data-pegawai', $datapegawai->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input type="text" class="form-control" value="{{$datapegawai->nik}}" name="nik" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{$datapegawai->nama}}" name="nama" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" value="{{$datapegawai->alamat}}" name="alamat" required>
                                </div>
                            </div>
                        </div>
                        <div class="row  mt-3">
                            <div class="col-md-3">
                                <label for="">Divisi</label>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3 form-control" value="{{$datapegawai->divisi}}" name="divisi" required>
                                        <option selected> ------ Pilih Opsi ------ </option>
                                        <option selected>{{ $datapegawai->divisi }}</option>
                                        @foreach ($list_divisi as $divisi)
                                            <option value="{{ $divisi->divisi }}">
                                                {{ $divisi->divisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Jabatan</label>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3 form-control" name="id_jabatan" required>
                                        <option selected> ------ Pilih Opsi ------ </option>
                                        <option value="{{$datapegawai->jabatan->id}}" selected>{{ $datapegawai->jabatan->nama_jabatan }}</option>
                                        @foreach ($list_jabatan as $jabatan)
                                            <option value="{{$jabatan->id}}" class="text-uppercase">
                                                {{ $jabatan->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Status Kerja </label>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3 form-control" value="{{$datapegawai->status_kerja}}" name="status_kerja" required>
                                        <option selected> ------ Pilih Opsi ------ </option>
                                        <option selected>{{ $datapegawai->status_kerja }}</option>
                                        @foreach ($list_statuskerja as $statuskerja)
                                            <option value="{{ $statuskerja->statuskerja }}</">
                                                {{ $statuskerja->statuskerja }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Jam Kerja</label>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3 form-control" value="{{$datapegawai->hari_kerja}}" name="hari_kerja" required>
                                        <option selected> ------ Pilih Opsi ------ </option>
                                        <option selected>{{ $datapegawai->hari_kerja }}</option>
                                        @foreach ($list_harikerja as $harikerja)
                                            <option {{ $harikerja->hari_kerja }}>
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
                                        <span class="input-group-text">$</span>
                                        <input class="form-control" type="text" value="{{$datapegawai->gaji_pokok}}" name="gaji_pokok" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Jatah Cuti / Tahun</label>
                                    <input type="text" class="form-control" value="{{$datapegawai->jatah_cuti}}" name="jatah_cuti" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tanggal Mulai Kerja</label>
                                    <input type="date" class="form-control" value="{{$datapegawai->tanggal_masuk}}" name="tanggal_masuk" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" value="{{$datapegawai->tanggal_berakhir}}" name="tanggal_berakhir" required>
                                </div>
                            </div>
                        </div>
                        <div class="row  mt-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="{{$datapegawai->tanggal_lahir}}" name="tanggal_lahir" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Jenis Kelamin</label>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3 form-control" value="{{$datapegawai->jenis_kelamin}}" name="jenis_kelamin" required>
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
                                    <input type="text" class="form-control" value="{{$datapegawai->no_handphone}}" name="no_handphone" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="foto" accept=".jpeg, .jpg, .png">
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
                                    <input type="text" class="form-control" value="{{$datapegawai->email}}" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password">
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
    @endforeach
</x-template.admin>