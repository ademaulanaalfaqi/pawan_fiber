<x-template.pegawai>
    <div class="col-md-12">
        <a href="{{ 'dashboard' }}" class="btn btn-dark"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
    </div>
    <section class="section profile mt-2">
        <div class="row">
            <div class="col-xl-4">
                <a href="{{ url('pegawai/profil', request()->user()->id) }}/edit" class="btn btn-warning float-end "
                    style="margin-left: -20%; position: relative; z-index: 2; margin-top: 3% ; margin-right: 3%"><i
                        class="bi bi-pencil-square"></i></a>
                <div class="card pt-5 ">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img style="border-radius: 50%" class="image" style=" display: flex; justify-content: center;"
                            src="{{ url('public', request()->user()->foto) }}" alt="Foto Profil">
                        <h2>{{ request()->user()->nama }}</h2>
                        <h3 class="text-uppercase">{{ request()->user()->jabatan->nama_jabatan }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Data General</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Data
                                    Keluarga
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->nama }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">NIK</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->nik }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jabatan</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->jabatan->nama_jabatan }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Divisi</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->divisi }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->alamat }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor Handphone</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->no_handphone }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->email }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Status Kerja</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->status_kerja }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Hari Kerja</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->jam_kerja }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Gaji Pokok</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->gaji_pokok }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jatah Cuti</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->jatah_cuti }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tanggal Bergabung</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->tanggal_masuk }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tanggal Berakhir</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->tanggal_berakhir }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->tanggal_lahir }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                    <div class="col-lg-9 col-md-8">{{ request()->user()->jenis_kelamin }}</div>
                                </div>
                            </div>

                            {{-- Data Keluarga --}}
                            <div class="tab-pane fade profile-edit pt-5" id="profile-edit">
                                <div class="btn-group float-end" style="margin-top: -6%">
                                    @if ($datakeluarga->DKeluarga != null)
                                        <a href="{{ url('pegawai/profil/editkeluarga', $datakeluarga->DKeluarga->id) }}"
                                            class="btn btn-warning float-end"><i class="bi bi-pencil-square"></i>
                                            Edit</a>
                                    @endif
                                    <button style="" type="button" class="btn btn-primary float-end"
                                        data-bs-toggle="modal" data-bs-target="#lengkapi-data">
                                        <i class="bi bi-plus-lg"></i> Lengkapi Data
                                    </button>
                                </div>
                                <!-- Profile Edit Form -->

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-3 col-lg- col-form-label">Nama
                                        Lengkap</label>

                                    <div class="col-lg-9 col-md-8">
                                        <div class="pt-2">
                                            <div class="col-lg-9 col-md-8">:
                                                @if ($datakeluarga->DKeluarga !== null)
                                                    {{ $datakeluarga->DKeluarga->nama }}
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-3 col-lg- col-form-label">Tempat &
                                        Tanggal Lahir</label>
                                    <div class="col-lg-9 col-md-8">
                                        <div class="pt-2">
                                            <div class="col-lg-9 col-md-8">:
                                                @if ($datakeluarga->DKeluarga !== null)
                                                    {{ $datakeluarga->DKeluarga->tempat_lahir }}
                                                @endif
                                                , @if ($datakeluarga->DKeluarga !== null)
                                                    {{ date('d F Y', strtotime($datakeluarga->DKeluarga->tanggal_lahir)) }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="about" class="col-md-4 col-lg-3 col-form-label">Alamat
                                        Tempat
                                        Tinggal</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="col-lg-9 col-md-8">
                                            <div class="pt-2">
                                                <div class="col-lg-9 col-md-8">:
                                                    @if ($datakeluarga->DKeluarga !== null)
                                                        {{ $datakeluarga->DKeluarga->alamat }}
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Nomor
                                        Telepon</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="col-lg-9 col-md-8">
                                            <div class="pt-2">
                                                <div class="col-lg-9 col-md-8">:
                                                    @if ($datakeluarga->DKeluarga !== null)
                                                        {{ $datakeluarga->DKeluarga->no_telepon }}
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Pekerjaan</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="pt-2">
                                            <div class="col-lg-9 col-md-8">:
                                                @if ($datakeluarga->DKeluarga !== null)
                                                    {{ $datakeluarga->DKeluarga->pekerjaan }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Country"
                                        class="col-md-4 col-lg-3 col-form-label">Kewarganegaraan</label>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="pt-2">
                                            <div class="col-lg-9 col-md-8">:

                                                @if ($datakeluarga->DKeluarga !== null)
                                                    {{ $datakeluarga->DKeluarga->kewarganegaraan }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal Tambah Data Keluarga --}}
                                <div class="modal fade" id="lengkapi-data" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Lengkapi Data Keluarga
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ url('pegawai/profil') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Nama Lengkap</label>
                                                            <input type="text" class="form-control" name="nama"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id_user"
                                                        value="{{ request()->user()->id }}">
                                                    <div class="col-md-12 mt-3">
                                                        <div class="form-group">
                                                            <label>Alamat Tempat Tinggal</label>
                                                            <div class="form-floating">
                                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="alamat"
                                                                    style="height: 100px"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Nomor Telepon</label>
                                                            <input type="text" class="form-control"
                                                                name="no_telepon" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Tempat Lahir</label>
                                                            <input type="text" class="form-control"
                                                                name="tempat_lahir" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Tanggal Lahir</label>
                                                            <input type="date" class="form-control"
                                                                name="tanggal_lahir" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Pekerjaan</label>
                                                            <input type="text" class="form-control"
                                                                name="pekerjaan" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="">Kewarganegaraan</label>
                                                        <div class="form-group">
                                                            <select
                                                                class="custom-select custom-select-lg mb-3 form-control"
                                                                name="kewarganegaraan" required>
                                                                <option selected> ------ Pilih Opsi ------ </option>

                                                                <option class="text-uppercase" value="1">
                                                                    WNI</option>
                                                                <option class="text-uppercase" value="2">
                                                                    WNA</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- End Tambah Data Keluarga --}}

                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                    data-bs-target="#data-anak"><i class="bi bi-plus"></i> Data
                                </button>
                                <table class="table">
                                    <thead style="font-weight:bold ">
                                        <td>No</td>
                                        <td>Nama</td>
                                        <td>Hubungan</td>
                                        <td>Anak Ke</td>
                                    </thead>
                                    <tbody>
                                        @foreach ($datakeluarga->DAnak as $item)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->hubungan }}</td>
                                                <td>{{ $item->anak_ke }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- Modal Tambah Data Anak --}}
                                <div class="modal fade" id="data-anak" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Anak</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ url('pegawai/profil/anak') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Nama </label>
                                                            <input type="text" class="form-control" name="nama"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id_user"
                                                        value="{{ Auth::user()->id }}">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Hubungan</label>
                                                            <input type="text" class="form-control"
                                                                name="hubungan" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Anak Ke</label>
                                                            <input type="text" class="form-control" name="anak_ke"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End Bordered Tabs -->
                </div>
            </div>
        </div>
    </section>
</x-template.pegawai>
