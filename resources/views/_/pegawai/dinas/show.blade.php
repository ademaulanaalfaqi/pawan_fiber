<x-template.pegawai>
    <div class="container">
        <a href="{{ url('pegawai/dinas') }}" class="btn btn-dark mb-1"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
        <div class="row  mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Dinas</h5> <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Nama</strong></label>
                                    <p class="form-control-static col-md-8">{{$dinas->nama}}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Tanggal mulai</strong></label>
                                    <p class="form-control-static col-md-8">{{date('d F Y', strtotime($dinas->tanggal_mulai))}}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Tanggal Selesai</strong></label>
                                    <p class="form-control-static col-md-8">{{date('d F Y', strtotime($dinas->tanggal_selesai))}}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Deskripsi</strong></label>
                                    <p class="form-control-static col-md-8">{{$dinas->deskripsi_dinas}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body" style="height: 250px">
                                        <div id="map" class="mt-2" style="height: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script type="module">
        var map = L.map('map').setView([-1.8169204, 109.987781], 9);
        
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        
        // <?php foreach ($list_dinas as $dinas) { ?>
        //     L.marker([<?= $dinas->latitude ?>, <?= $dinas->longitude ?>]).addTo(map).bindPopup('<?= $dinas->nama ?>');
        // <?php } ?>

        L.marker([<?= $dinas->latitude ?>, <?= $dinas->longitude ?>]).addTo(map).bindPopup('<?= $dinas->nama ?>');
                
    </script>
    @endpush
</x-template.pegawai>
