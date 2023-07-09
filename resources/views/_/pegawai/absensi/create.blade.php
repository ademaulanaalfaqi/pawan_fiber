<x-template.pegawai title="Absensi Pegawai" onload="getLocation()">
    <div class="container-fluid">
        <a href="{{url('pegawai/absensi')}}" class="btn btn-dark mb-3"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Absensi</h5>
                        <form class="myForm" action="{{ url('pegawai/absensi') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <input class="form-control" type="file" name="foto" accept="image/*" capture="camera" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="latitude" readonly hidden required >
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="longitude" readonly hidden required >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="map" style="height: 400px" hidden></div>
                                </div>
                            </div>
                            <button class="btn btn-warning float-end"><i  class="fa fa-save"></i> Simpan</button>
                        </form>
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

        var circle = L.circle([-1.8164813541587383, 109.98881218587321], {
            color: 'blue',
            fillColor: 'blue',
            fillOpacity: 0.2,
            radius: 5 // Ganti dengan radius yang diinginkan (dalam meter)
        }).addTo(map);

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