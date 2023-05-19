<x-template.admin title="Absensi Admin">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Absensi</h5>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title float-end">{{$hari_ini}}</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <th>Masuk</th>
                                        <th>Istirahat</th>
                                        <th>Pulang</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_absensi as $absensi)
                                        <tr>
                                            <td>{{$absensi->nama}}</td>
                                            <td>
                                                <div class="image" style="height: 50px">
                                                    <img style="height: 100%" src="{{ url("public/$absensi->foto") }}" class="rounded-circle" alt="">
                                                </div>
                                            </td>
                                            <td>{{ $absensi->created_at->format('H.i') }}</td>
                                            <td>
                                                @if ($absensi->istirahat == 2)
                                                    {{ date('H.i', strtotime($absensi->jam_istirahat)) }}                                                    
                                                @endif
                                                @if ($absensi->istirahat == 1)
                                                    -                                                    
                                                @endif
                                            </td>
                                            <td>
                                                @if ($absensi->pulang == 2)
                                                    {{ date('H.i', strtotime($absensi->jam_pulang)) }}                                                    
                                                @endif
                                                @if ($absensi->pulang == 1)
                                                    -                                                    
                                                @endif
                                            </td>
                                            <td><a href="{{ url('admin/absensi', $absensi->id) }}" class="btn btn-dark"><i class="bi bi-info-circle"></i></a></td>
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