<x-template.pegawai title="Detail Izin dan Cuti">
    <div class="container-fluid">
        <a href="{{ url('pegawai/izin-cuti') }}" class="btn btn-dark mb-3"><i class="bi bi-arrow-bar-left">
        </i> Kembali</a>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <a data-bs-toggle="modal" data-bs-target="#largeModal" href="">
                            <img class="mt-3" style="height: auto; max-width: 100%;" src="{{url("public/$izincuti->foto")}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Izin dan Cuti</h5> <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Nama</strong></label>
                                    <p class="form-control-static col-md-8">{{$izincuti->datapegawai->nama}}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Tanggal Mulai</strong></label>
                                    <p class="form-control-static col-md-8">{{date('d F Y', strtotime($izincuti->tanggal_mulai))}}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Sampai</strong></label>
                                    <p class="form-control-static col-md-8">{{date('d F Y', strtotime($izincuti->tanggal_selesai))}}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Tipe Izin</strong></label>
                                    <p class="form-control-static col-md-8">{{$izincuti->tipe_izin}}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Keterangan</strong></label>
                                    <p class="form-control-static col-md-8">{{$izincuti->keterangan}}</p>
                                </div>
                                <div class="row">
                                    <label for="" class="control-label col-md-4"><strong>Status</strong></label>
                                    <div class="form-control-static col-md-8">
                                        @if ($izincuti->status == 1)
                                            <span class="badge bg-info">Pengajuan Baru</span>
                                        @endif

                                        @if ($izincuti->status == 2)
                                            <span class="badge bg-success">Pengajuan Diterima</span>
                                        @endif

                                        @if ($izincuti->status == 3)
                                            <span class="badge bg-danger">Pengajuan Ditolak</span>
                                        @endif
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
                        <img src="{{ url("public/$izincuti->foto") }}" style="height: auto; max-width: 100%;" alt="foto">
                </div>
            </div>
        </div>
    </div>
</x-template.pegawai>