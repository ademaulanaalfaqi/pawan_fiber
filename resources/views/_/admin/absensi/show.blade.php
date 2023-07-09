<x-template.admin title="Detail Absensi">
    <div class="container-fluid">
        <a href="{{url('admin/absensi')}}" class="btn btn-dark mb-3"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right mt-3" id="map" style="width: 100%; height: 450px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Absensi</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Nama</strong></label>
                                    <p class="form-control-static col-md-8">{{$absensi->nama}}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Tanggal</strong></label>
                                    <p class="form-control-static col-md-8">{{date('d F Y', strtotime($absensi->created_at))}}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Foto</strong></label>
                                    <div class="text-center" style="height:300px;">
                                        <a data-bs-toggle="modal" data-bs-target="#largeModal" href="">
                                            <img class="img-thumbnail rounded" style="height: 100%;" src="{{ url("public/$absensi->foto") }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="largeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ url("public/$absensi->foto") }}" style="height: auto; max-width: 100%;" alt="foto">
                </div>
            </div>
        </div>
    </div>   

    @push('script')
        <script type="module">
            var latitude = {{ $absensi->latitude }};
            var longitude = {{ $absensi->longitude }};
            var map = L.map('map').setView([latitude, longitude], 15);
            
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([<?= $absensi->latitude ?>, <?= $absensi->longitude ?>]).addTo(map).bindPopup('<?= $absensi->nama?> <br> <?= $absensi->created_at->format('H:i') ?>');
                    
        </script>
    @endpush
</x-template.admin>
