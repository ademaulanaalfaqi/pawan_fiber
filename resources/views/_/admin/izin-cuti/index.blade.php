<x-template.admin title="Izin dan Cuti Admin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Izin dan Cuti</h5>
                        <div class="table-responsive mt-3">
                            <table class="table datatable">
                                <thead class="thead-default">
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Nama</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tipe Izin</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    @foreach ($list_izincuti as $izincuti)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{url('admin/izin-cuti', $izincuti->id)}}" class="btn btn-dark m-1"><i class="fa fa-info"></i> Lihat</a>
                                                @if ($izincuti->status == 1)
                                                    <form action="{{url('admin/izin-cuti/setuju', $izincuti->id)}}" method="post">
                                                        @csrf
                                                        @method("PUT")
                                                        <button class="btn btn-success m-1"><i class="fa fa-check"></i> Setuju</button>
                                                    </form>
                                                    <form action="{{url('admin/izin-cuti/tolak', $izincuti->id)}}" method="post">
                                                        @csrf
                                                        @method("PUT")
                                                        <button class="btn btn-danger m-1"><i class="fa fa-times"></i> Tolak</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{$izincuti->datapegawai->nama}}</td>
                                        <td>{{date('d F Y', strtotime($izincuti->created_at))}}</td>
                                        <td>{{date('d F Y', strtotime($izincuti->tanggal_mulai))}}</td>
                                        <td>{{$izincuti->tipe_izin}}</td>
                                        <td>{{$izincuti->keterangan}}</td>
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
</x-template.admin>