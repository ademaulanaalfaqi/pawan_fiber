<x-template.admin title="Edit Fee Lembur">
    <div class="container">
        <a href="{{url('admin/potongan-tunjangan%Lembur')}}" class="btn btn-dark mb-3" style="font-weight: bold;"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Edit Potongan Bpjs</h5>
                            </div>
                            <hr>
                        </div>
                        <form action="{{ url('admin/potongan-tunjangan%BPJS', $bpjs->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="" class="control-label mt-2">Nominal :</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select class="custom-select custom-select-lg mb-3 form-control" name="nominal" required>
                                            <option selected>
                                                @if ($bpjs->nominal == 0.01)
                                                <td>1% Dari Gaji</td>
                                                @endif
                                                @if ($bpjs->nominal == 0.02)
                                                <td>2% Dari Gaji</td>
                                                @endif
                                                @if ($bpjs->nominal == 0.03)
                                                <td>3% Dari Gaji</td>
                                                @endif
                                                @if ($bpjs->nominal == 0.04)
                                                <td>4% Dari Gaji</td>
                                                @endif
                                                @if ($bpjs->nominal == 0.05)
                                                <td>5% Dari Gaji</td>
                                                @endif
                                            </option>
                                            <option value="0.01">1% dari gaji</option>
                                            <option value="0.02">2% dari gaji</option>
                                            <option value="0.03">3% dari gaji</option>
                                            <option value="0.04">4% dari gaji</option>
                                            <option value="0.05">5% dari gaji</option>
                                        </select>
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