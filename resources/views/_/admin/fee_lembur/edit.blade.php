<x-template.admin title="Edit Fee Lembur">
    <div class="container">
        <a href="{{url('admin/potongan-tunjangan%Lembur')}}" class="btn btn-dark mb-3"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Edit Fee Lembur</h5>
                            </div>
                            <hr>
                        </div>
                        <form action="{{ url('admin/potongan-tunjangan%Lembur', $lembur->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="" class="control-label mt-2">Nominal :</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="nominal" value="{{ $lembur->nominal }}">
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