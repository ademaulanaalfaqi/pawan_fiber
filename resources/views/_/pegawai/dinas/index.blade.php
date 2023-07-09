<x-template.pegawai title="Dinas Pegawai">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Dinas Pegawai</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('pegawai/dinas/create') }}" class="btn btn-outline-success float-end mt-3"> <i class="bi bi-plus-lg"></i> Tambah</a>
                            </div>
                        </div>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Nama</th>
                                    <th>Tanggal Mulai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_dinas as $dinas)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('pegawai/dinas', $dinas->id) }}" class="btn btn-dark ">
                                                    Lihat
                                                </a>
                                                <x-button.delete url="{{ url('pegawai/dinas', $dinas->id) }}" />
                                            </div>
                                        </td>
                                        <td>{{ $dinas->nama }}</td>
                                        <td>{{ date('d F Y', strtotime($dinas->tanggal_mulai)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.pegawai>
