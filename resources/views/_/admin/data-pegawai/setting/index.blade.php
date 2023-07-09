<x-template.admin>

    {{-- DATA DIVISI --}}


    <div class="modal fade" id="divisi" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Divisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/data-pegawai/setting/divisi') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Divisi</label>
                                    <input type="text" class="form-control" name="divisi" required>
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
    {{-- END DATA DIVISI --}}


    {{-- DATA JABATAN --}}

    <div class="modal fade" id="jabatan" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/data-pegawai/setting/jabatan') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" required>
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

    {{-- END DATA JABATAN --}}


    {{-- DATA HARI KERJA --}}


    <div class="modal fade" id="harikerja" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Hari Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/data-pegawai/setting/hari_kerja') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Hari Kerja</label>
                                    <input type="text" class="form-control" name="hari_kerja" required>
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

    {{-- END DATA HARI KERJA --}}

    {{-- DATA STATUS KERJA --}}

    <div class="modal fade" id="statuskerja" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Status Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/data-pegawai/setting/statuskerja') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Status Kerja</label>
                                    <input type="text" class="form-control" name="statuskerja" required>
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

    {{-- END DATA STATUS KERJA --}}


    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><strong>// Setting</strong></h5>

            <!-- Bordered Tabs Justified -->
            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home"
                        aria-selected="true">Divisi</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                        data-bs-target="#bordered-justified-profile" type="button" role="tab"
                        aria-controls="profile" aria-selected="false">Jabatan</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab"
                        data-bs-target="#bordered-justified-contact" type="button" role="tab"
                        aria-controls="contact" aria-selected="false">Hari Kerja</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="statuskerja-tab" data-bs-toggle="tab"
                        data-bs-target="#bordered-justified-statuskerja" type="button" role="tab"
                        aria-controls="statuskerja" aria-selected="false">Status Kerja</button>
                </li>
            </ul>
            <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel"
                    aria-labelledby="home-tab">

                    <div class="col-md-12">

                        <div class="card-body">
                            <div class="card-header">
                                <div class="card-title">
                                    // Data Divisi
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                        data-bs-target="#divisi">
                                        <i class="bi bi-plus-lg"></i> Data
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table datatable">
                                    <thead>
                                        <tr>
                                            <td><strong> #</strong></td>
                                            <td><strong> Aksi</strong></td>
                                            <td><strong> Daftar Divisi</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_divisi as $divisi)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>
                                                    <x-button.delete
                                                        url="{{ url('admin/data-pegawai/setting/divisi', $divisi->id) }}" />
                                                </td>
                                                <td class="text-uppercase">{{ $divisi->divisi }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <div class="col-md-12">

                        <div class="card-body">
                            <div class="card-header">
                                <div class="card-title">
                                    // Data Jabatan
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                        data-bs-target="#jabatan">
                                        <i class="bi bi-plus-lg"></i> Data
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table datatable">
                                    <thead>
                                        <tr>
                                            <td><strong> #</strong></td>
                                            <td><strong> Aksi</strong></td>
                                            <td><strong> Daftar Jabatan</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_jabatan as $jabatan)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>
                                                    <x-button.delete
                                                        url="{{ url('admin/data-pegawai/setting/jabatan', $jabatan->id) }}" />
                                                </td>
                                                <td class="text-uppercase">{{ $jabatan->nama_jabatan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel"
                    aria-labelledby="contact-tab">
                    <div class="col-md-12">

                        <div class="card-body">
                            <div class="card-header">
                                <div class="card-title">
                                    // Data Hari Kerja
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                        data-bs-target="#harikerja">
                                        <i class="bi bi-plus-lg"></i> Data
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table datatable">
                                    <thead>
                                        <tr>
                                            <td><strong> #</strong></td>
                                            <td><strong> Aksi</strong></td>
                                            <td><strong> Daftar Hari Kerja</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_harikerja as $harikerja)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>
                                                    <x-button.delete
                                                        url="{{ url('admin/data-pegawai/setting/hari_kerja', $harikerja->id) }}" />
                                                </td>
                                                <td class="text-uppercase">{{ $harikerja->hari_kerja }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="tab-pane fade" id="bordered-justified-statuskerja" role="tabpanel"
                    aria-labelledby="statuskerja-tab">
                    <div class="col-md-12">

                        <div class="card-body">
                            <div class="card-header">
                                <div class="card-title">
                                    // Data Status Kerja
                                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                        data-bs-target="#statuskerja">
                                        <i class="bi bi-plus-lg"></i> Data
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table datatable">
                                    <thead>
                                        <tr>
                                            <td><strong> #</strong></td>
                                            <td><strong> Aksi</strong></td>
                                            <td><strong> Daftar Status Kerja</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_statuskerja as $statuskerja)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>
                                                    <x-button.delete
                                                        url="{{ url('admin/data-pegawai/setting/statuskerja', $statuskerja->id) }}" />
                                                </td>
                                                <td class="text-uppercase">{{ $statuskerja->statuskerja }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div><!-- End Bordered Tabs Justified -->

        </div>
    </div>
</x-template.admin>
