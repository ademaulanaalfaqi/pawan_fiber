<x-template.pegawai title="Profil Pegawai">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mt-3 d-flex justify-content-center" style="height:300px;">
                            @if (auth()->user()->foto)
                                <img class="h-100 rounded" src="{{ url('public', Auth()->user()->foto) }}" alt="Profil">                    
                            @else
                                <img class="h-100 rounded" src="{{url('public')}}/assets/img/download.jpg" alt="Profil">                        
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Profil Pegawai</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$datapegawai->id}}" class="btn btn-warning float-end mt-3">Edit</a>
                            </div>
                        </div> <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mb-2">
                                    <div class="col-md-4" style="font-weight: bold;">
                                        Nama Lengkap
                                    </div>
                                    <div class="col-md-8">
                                        {{ request()->user()->nama }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4" style="font-weight: bold">
                                        NIK
                                    </div>
                                    <div class="col-md-8">
                                        {{ request()->user()->nik }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4" style="font-weight: bold">
                                        Email
                                    </div>
                                    <div class="col-md-8">
                                        {{ request()->user()->email }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4" style="font-weight: bold">
                                        Nomor Telepon
                                    </div>
                                    <div class="col-md-8">
                                        {{ request()->user()->no_handphone }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4" style="font-weight: bold">
                                        Divisi
                                    </div>
                                    <div class="col-md-8">
                                        {{ request()->user()->divisi }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4" style="font-weight: bold">
                                        Jabatan
                                    </div>
                                    <div class="col-md-8">
                                        {{ request()->user()->jabatan }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4" style="font-weight: bold">
                                        Status Kerja
                                    </div>
                                    <div class="col-md-8">
                                        {{ request()->user()->status_kerja }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-4" style="font-weight: bold">
                                        Gaji Pokok
                                    </div>
                                    <div class="col-md-8">
                                        {{ request()->user()->gaji_pokok_string }}
                                    </div>
                                </div>
                                {{-- <table class="table table-borderless" style="border-top: none;">
                                    <tbody>
                                        <tr>
                                            <td style="border-top: none;">1. &nbsp Nama</td>
                                            <td style="border-top: none;">: &nbsp {{ request()->user()->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border-top: none;">2. &nbsp NIK</td>
                                            <td style="border-top: none;">: &nbsp {{ request()->user()->nik }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border-top: none;">3. &nbsp Email</td>
                                            <td style="border-top: none;">: &nbsp {{ request()->user()->email }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border-top: none;">4. &nbsp Nomor Telepon</td>
                                            <td style="border-top: none;">: &nbsp {{ request()->user()->no_handphone }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border-top: none;">5. &nbsp Divisi</td>
                                            <td style="border-top: none;">: &nbsp {{ request()->user()->divisi }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border-top: none;">6. &nbsp Jabatan</td>
                                            <td style="border-top: none;">: &nbsp {{ request()->user()->jabatan }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border-top: none;">7. &nbsp Kontrak Kerja</td>
                                            <td style="border-top: none;">: &nbsp {{ request()->user()->status_kerja }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border-top: none;">8. &nbsp Gaji Pokok</td>
                                            <td style="border-top: none;">: &nbsp {{ request()->user()->gaji_pokok_string }}</td>
                                        </tr>
                                    </tbody>
                                </table> --}}
                            </div>
                        </div>
                    </div>
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
                        <h5 class="modal-title">Tambah Data Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('pegawai/profil', $datapegawai->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" value="{{$datapegawai->nama}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$datapegawai->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" name="no_handphone" value="{{$datapegawai->no_handphone}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" value="{{$datapegawai->alamat}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Foto</label>
                                        <input type="file" class="form-control" name="foto" accept=".jpg, .png, .jpeg">
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
</x-template.pegawai>