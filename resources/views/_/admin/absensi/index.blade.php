<x-template.admin title="Absensi Admin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Absensi <br>
                            <span class="text-secondary">{{ $hari_ini }}</span>
                        </h5>
                        <form method="GET" action="{{url('admin/absensi')}}" class="row g-3">
                            <div class="col-auto">
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Filter</button>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table tabel-hover">
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
                                            <td>{{ $absensi->nama }}</td>
                                            <td>
                                                <div class="image" style="height: 50px">
                                                    <img style="height: 100%" src="{{ url("public/$absensi->foto") }}"
                                                        class="rounded-circle" alt="">
                                                </div>
                                            </td>
                                            @if ($absensi->status == 1)
                                                <td class="bg-success text-white">{{ $absensi->created_at->format('H.i') }}</td>
                                            @endif
                                            @if ($absensi->status == 2)
                                                <td class="bg-warning text-white">{{ $absensi->created_at->format('H.i') }}</td>
                                            @endif
                                            @if ($absensi->status == 3)
                                                <td class="bg-danger text-white">{{ $absensi->created_at->format('H.i') }}</td>
                                            @endif
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
                                            <td><a href="{{ url('admin/absensi', $absensi->id) }}"
                                                    class="btn btn-dark"><i class="bi bi-info-circle"></i></a></td>
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
