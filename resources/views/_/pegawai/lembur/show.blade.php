<x-template.pegawai title="Detail Lembur Pegawai">
    <div class="container">
        <a href="{{url('pegawai/lembur')}}" class="btn btn-dark mb-3"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Lembur</h5>
                        <h4>{{$lembur->nama}}</h4> <hr>
                        <p>
                            Tanggal : <strong>{{date('d F Y', strtotime($lembur->tanggal))}}</strong> <br>
                            Jam Mulai : <strong>{{date('H.i', strtotime($lembur->created_at))}}</strong> <br>
                            @if ($lembur->lembur == 2)
                                Jam Selesai : <strong>{{date('H.i', strtotime($lembur->selesai))}}</strong>                                                    
                            @endif
                            @if ($lembur->lembur == 1)
                                Jam Selesai : <strong>-</strong>                                                    
                            @endif
                        </p> <hr>
                        <p>
                            {{$lembur->aktifitas}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.pegawai>