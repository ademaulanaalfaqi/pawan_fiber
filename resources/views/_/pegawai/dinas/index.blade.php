<x-template.pegawai title="Dinas Pegawai">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Dinas Pegawai</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('pegawai/dinas/create')}}" class="btn btn-outline-success float-end mt-3">Tambah</a>
                            </div>
                        </div>
                        <table class="datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Nama</th>
                                    <th>Tanggal Mulai</th>
                                </tr>
                            </thead>
                            @foreach ($list_dinas as $dinas)
                                <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td></td>
                                        <td>{{$dinas->nama}}</td>
                                        <td>{{ date('d F Y', strtotime($dinas->tanggal_mulai)) }}</td>
                                    </tr>
                                </tbody>                                
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.pegawai>