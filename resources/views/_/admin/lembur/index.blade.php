<x-template.admin title="Lembur Admin">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lembur</h5>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <th>Aksi</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Aktifitas</th>
                                </thead>
                                <tbody>
                                    @foreach ($list_lembur as $lembur)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{url('admin/lembur', $lembur->id)}}" class="btn btn-dark"><i class="fa fa-info"></i> Lihat</a>
                                                    <x-button.delete url="{{ url('admin/lembur', $lembur->id) }}" />
                                                </div>
                                            </td>
                                            <td>{{$lembur->nama}}</td>
                                            <td>{{date('d F Y', strtotime($lembur->created_at))}}</td>
                                            <td>{{date('H.i', strtotime($lembur->created_at))}}</td>
                                            <td>
                                                @if ($lembur->lembur == 2)
                                                    {{ date('H.i', strtotime($lembur->selesai)) }}                                                    
                                                @endif
                                                @if ($lembur->lembur == 1)
                                                    -                                                    
                                                @endif
                                            </td>
                                            <td>{{$lembur->aktifitas}}</td>
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
</x-template.admin>