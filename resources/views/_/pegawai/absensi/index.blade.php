<x-template.pegawai title="Absensi Pegawai">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Absensi</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('pegawai/absensi/create') }}" class="btn btn-outline-success float-end mt-3"><i class="fa fa-plus"></i>Absen</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th data-orderable="true">No</th>
                                        <th>Aksi</th>
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <th>Tanggal</th>
                                        <th>Masuk</th>
                                        <th>Istirahat</th>
                                        <th>Pulang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_absensi as $absensi)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('pegawai/absensi', $absensi->id) }}" class="btn btn-dark m-1">Detail</a>
                                                </div>
                                                <div class="btn-group">
                                                    @if ($absensi->istirahat == 1 && $absensi->pulang == 1)
                                                        <form action="{{url('pegawai/absensi/istirahat', $absensi->id)}}" method="post">
                                                            @csrf
                                                            @method("PUT")
                                                            <input type="time" name="jam_istirahat" value="{{date('H:i:s')}}" hidden>
                                                            <button class="btn btn-warning m-1">Istirahat</button>
                                                        </form>
                                                    @endif
                                                </div>
                                                <div class="btn-group">
                                                    @if ($absensi->pulang == 1)
                                                        <form action="{{url('pegawai/absensi/pulang', $absensi->id)}}" method="post">
                                                            @csrf
                                                            @method("PUT")
                                                            <input type="time" name="jam_pulang" value="{{date('H:i:s')}}" hidden>
                                                            <button class="btn btn-warning m-1">Pulang</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{$absensi->nama}}</td>
                                            <td>
                                                <div class="image" style="height: 50px">
                                                    <img style="height: 100%" src="{{ url("public/$absensi->foto") }}" class="rounded-circle" alt="">
                                                </div>
                                            </td>
                                            <td>{{$absensi->created_at->format('d F Y')}}</td>
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

    <script>
        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition,showError);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
            document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
        }

        function showError(error) {
            switch(error.code){
                case error.PERMISSION_DENIED:
                    alert("Hidupkan GPS terlebih dahulu");
                    location.reload();
                    break;
            }
        }

        // function showPosition(position) {
        //     x.innerHTML = "Latitude: " + position.coords.latitude +
        //         "<br>Longitude: " + position.coords.longitude;
        // }
    </script>
</x-template.pegawai>