<x-template.pegawai>
    <div class="container">
        <a href="{{ url('pegawai/dinas') }}" class="btn btn-dark mb-1"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
        <div class="row  mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Detail Dinas</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>{{ $dinas->nama }}</h4>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="container">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td>Tanggal Mulai</td>
                                                        <td>:</td>
                                                        <td>{{ date('d F Y', strtotime($dinas->tanggal_mulai)) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2.</td>
                                                        <td>Tanggal Selesai</td>
                                                        <td>:</td>
                                                        <td>{{ date('d F Y', strtotime($dinas->tanggal_selesai)) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3.</td>
                                                        <td>Deskripsi Dinas</td>
                                                        <td>:</td>
                                                        <td>{{ $dinas->deskripsi_dinas }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="card-body" style="height: 250px">
                                    <div id="map" style="height: 100%;"></div>
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
