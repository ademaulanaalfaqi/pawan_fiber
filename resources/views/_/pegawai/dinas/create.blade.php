<x-template.pegawai title="Tambah Data Dinas">
    <div class="container">
        <a href="{{ url('pegawai/dinas') }}" class="btn btn-dark mb-3"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Dinas</h5>
                        <form class="myForm" action="{{ url('pegawai/dinas') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama"
                                    value="{{ request()->user()->nama }}" readonly>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tanggal Mulai </label>
                                        <input type="date" class="form-control" name="tanggal_mulai" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tanggal Selesai</label>
                                        <input type="date" class="form-control" name="tanggal_selesai" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Deskripsi Dinas</label>
                                        <input type="text" class="form-control" name="deskripsi_dinas" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">latitude</label>
                                        <input type="text" id="latitude-input" class="form-control" name="latitude"
                                            readonly required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Longitude</label>
                                        <input type="text" id="longitude-input" class="form-control" name="longitude"
                                            readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="" class="control-label">Pilih Lokasi</label>
                                <div id="map">
                                    <style>
                                        #map {

                                            height: 350px;

                                        }
                                    </style>
                                </div>
                            </div>
                            <button class="btn btn-dark float-right mt-4 float-end"> <i
                                    class="mdi mdi-content-save"></i>Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        var map = L.map('map', {drawControl: false}).setView([-1.8498701, 109.9749553], 13);
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

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
</x-template.pegawai>
