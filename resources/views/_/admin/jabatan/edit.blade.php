<x-template.admin title="Jabatan + Gaji Pokok">
    <div class="container">
        <a href="{{url('admin/jabatan')}}" class="btn btn-dark mb-3"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Edit Data Jabatan</h5>
                            </div>
                            <hr>
                        </div>
                        <form action="{{ url('admin/jabatan', $jabatan->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="" class="control-label mt-2">Nama Jabatan</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama_jabatan" value="{{$jabatan->nama_jabatan}}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="" class="control-label mt-2">Gaji Pokok</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="gapok" value="{{$jabatan->gapok}}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <hr>
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-end"><i class="bi bi-cloud-arrow-up"></i> Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.admin>