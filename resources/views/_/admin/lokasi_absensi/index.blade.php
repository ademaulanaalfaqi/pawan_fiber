<x-template.admin title="Lokasi Absensi">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Lokasi Absensi</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('admin/lokasi_absensi/create')}}" class="btn btn-outline-success float-end mt-3">Tambah Lokasi</a>
                            </div>
                        </div>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_lokasi_absensi as $lokasiabsensi)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <div class="form-group">
                                                <a href="{{url('admin/lokasi_absensi', $lokasiabsensi->id)}}" class="btn btn-dark">Lihat</a>
                                            </div>
                                        </td>
                                        <td>{{$lokasiabsensi->lokasi}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.admin>
