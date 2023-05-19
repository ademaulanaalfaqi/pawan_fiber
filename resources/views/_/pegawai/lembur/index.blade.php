<x-template.pegawai title="Lembur Pegawai">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Lembur</h5>
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
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Aktifitas</th>
                                </thead>
                                <tbody>
                                    @foreach ($list_lembur as $lembur)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{url('pegawai/lembur', $lembur->id)}}" class="btn btn-dark"><i class="fa fa-info"></i> Lihat</a>
                                                    @if ($lembur->lembur == 1)
                                                        <form action="{{url('pegawai/lembur/selesai', $lembur->id)}}" method="post">
                                                            @csrf
                                                            @method("PUT")
                                                            <input type="time" name="selesai" value="{{date('H:i:s')}}" hidden>
                                                            <button class="btn btn-warning">Pulang</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{$lembur->nama}}</td>
                                            <td>{{date('d F Y', strtotime($lembur->created_at))}}</td>
                                            <td>{{date('H.i', strtotime($lembur->created_at))}}</td>
                                            <td>
                                                @if ($lembur->lembur == 2)
                                                    {{ date('H.i', strtotime($lembur->selesai)) }}                                                    
                                                @endif
                                                @if ($lembur->lembur == 1)
                                                    -                                                    
                                                @endif
                                            </td>
                                            <td>{{$lembur->aktifitas}}</td>
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
                    <h5 class="modal-title">Tambah Lembur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('pegawai/lembur') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Aktifitas</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="aktifitas" cols="10" rows="10"></textarea required>
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
</x-template.pegawai>