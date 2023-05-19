<x-template.pegawai title="Izin dan Cuti Pegawai">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Izin dan Cuti</h5>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-success float-end mt-3"
                                    data-bs-toggle="modal" data-bs-target="#ModalTambah">
                                    Tambah
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>Nama</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tipe Izin</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_izincuti as $izincuti)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('pegawai/izin-cuti', $izincuti->id) }}"
                                                        class="btn btn-dark"><i class="fa fa-info"></i> Lihat</a>
                                                    @if ($izincuti->status == 1)
                                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEdit{{$izincuti->id}}">
                                                            Edit
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{$izincuti->datapegawai->nama}}</td>
                                            <td>{{ $izincuti->created_at->format('d F o') }}</td>
                                            <td>{{ date('d F Y', strtotime($izincuti->tanggal_mulai)) }}</td>
                                            <td>{{ $izincuti->tipe_izin }}</td>
                                            <td>{{ $izincuti->keterangan }}</td>
                                            <td>
                                                @if ($izincuti->status == 1)
                                                    <span class="badge bg-info">Pengajuan Baru</span>
                                                @endif

                                                @if ($izincuti->status == 2)
                                                    <span class="badge bg-success">Pengajuan Diterima</span>
                                                @endif

                                                @if ($izincuti->status == 3)
                                                    <span class="badge bg-danger">Pengajuan Ditolak</span>
                                                @endif
                                            </td>
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

    {{-- Modal Tambah Data --}}
    <div class="modal fade" id="ModalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Izin dan Cuti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('pegawai/izin-cuti') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-sm-2 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-10">
                              <input type="date" name="tanggal_mulai" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-2 ">Tanggal Selesai</label>
                            <div class="col-sm-10">
                              <input type="date" name="tanggal_selesai" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tipe Izin</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="tipe_izin" aria-label="Default select example">
                                    <option selected>Pilih</option>
                                    <option value="Cuti">Cuti</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Sakit">Sakit</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Bukti</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="foto" accept=".png, .jpg, .jpeg">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" name="keterangan" class="form-control">
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


    @foreach ($list_izincuti as $izincuti)
        {{-- Modal Edit Data --}}
        <div class="modal fade" id="ModalEdit{{$izincuti->id}}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Izin dan Cuti</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('pegawai/izin-cuti', $izincuti->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Tanggal Mulai</label>
                                        <input type="date" name="tanggal_mulai" value="{{$izincuti->tanggal_mulai}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Tanggal Selesai</label>
                                        <input type="date" name="tanggal_selesai" value="{{$izincuti->tanggal_selesai}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="" class="control-label">Tipe Izin</label>
                                        <select name="tipe_izin" class="form-control">
                                            <option value="">Pilih</option>
                                            <option selected>{{ $izincuti->tipe_izin }}</option>
                                            <option value="Cuti">Cuti</option>
                                            <option value="Izin">Izin</option>
                                            <option value="Sakit">Sakit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="" class="control-label">Foto</label>
                                        <input type="file" class="form-control" name="foto"
                                            accept=".png, .jpg, .jpeg">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Keterangan</label>
                                <input type="text" name="keterangan" value="{{$izincuti->keterangan}}" class="form-control">
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
