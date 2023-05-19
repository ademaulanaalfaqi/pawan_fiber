<x-template.admin title="Detail Lokasi">
    <div class="container">
        <a href="{{url('admin/lokasi_absensi')}}" class="btn btn-dark mb-3"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Detail Lokasi Absensi</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('admin/lokasi_absensi', $lokasiabsensi->id)}}/edit" class="btn btn-warning float-end mt-3">Edit</a>
                            </div>
                        </div>
                        <form action="{{url('admin/lokasi_absensi')}}" method="post">
                            @csrf
                            <div class="row  mt-3">
                                <div class="col-md-8">
                                    <div style="height: 500px" id="map"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="control-label mb-1"><strong>Nama Lokasi</strong></label>
                                                <p class="form-control-static">{{$lokasiabsensi->lokasi}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="control-label mb-1"><strong>Latitude</strong></label>
                                                <p class="form-control-static">{{$lokasiabsensi->latitude}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="control-label mb-1"><strong>Longitude</strong></label>
                                                <p class="form-control-static">{{$lokasiabsensi->longitude}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        var latitude = {{ $lokasiabsensi->latitude }};
        var longitude = {{ $lokasiabsensi->longitude }};
        var map = L.map('map').setView([latitude, longitude], 15);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([<?= $lokasiabsensi->latitude ?>, <?= $lokasiabsensi->longitude ?>]).addTo(map).bindPopup('<?= $lokasiabsensi->lokasi?>');
    </script>
</x-template.admin>