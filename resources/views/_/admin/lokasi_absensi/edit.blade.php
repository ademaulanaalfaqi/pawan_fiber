<x-template.admin title="Edit Lokasi">
    <div class="container">
        <a href="{{url('admin/lokasi_absensi', $lokasiabsensi->id)}}" class="btn btn-dark mb-3"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Lokasi Absensi</h5>
                        <form action="{{url('admin/lokasi_absensi', $lokasiabsensi->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row  mt-3">
                                <div class="col-md-8">
                                    <div style="height: 500px" id="map"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="control-label mb-1">Nama Lokasi</label>
                                                <input type="text" class="form-control" name="lokasi" value="{{$lokasiabsensi->lokasi}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="control-label mb-1">Latitude</label>
                                                <input type="text" id="latitude-input" class="form-control" name="latitude" value="{{$lokasiabsensi->latitude}}" readonly required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="control-label mb-1">Longitude</label>
                                                <input type="text" id="longitude-input" class="form-control" name="longitude" value="{{$lokasiabsensi->longitude}}" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary col-md-12">Simpan</button>
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

        // search
        L.Control.geocoder().addTo(map);
        
        // Membuat instance toolbar
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                polygon: false, // aktifkan fitur menggambar poligon
                circle: false, // aktifkan fitur menggambar lingkaran
                rectangle: false, // aktifkan fitur menggambar persegi panjang
                marker: false, // nonaktifkan fitur menggambar titik
                polyline: false, // nonaktifkan fitur menggambar garis
            },
            edit: {
                featureGroup: drawnItems,
            },
        });

        map.addControl(drawControl);

        // Menangani event ketika fitur digambar di peta
        map.on('draw:created', function (e) {
            var layer = e.layer;
            drawnItems.addLayer(layer);

            // Ambil koordinat fitur yang digambar
            var latLng = layer.getLatLng();
            var latitude = latLng.lat;
            var longitude = latLng.lng;

            // Masukkan nilai latitude dan longitude ke input form
            document.getElementById('latitude-input').value = latitude;
            document.getElementById('longitude-input').value = longitude;
        });
    </script>
</x-template.admin>
