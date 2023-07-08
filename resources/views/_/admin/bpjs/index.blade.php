<x-template.admin title="Potongan + Tunjangan">
    <div class="row">
        <div class="col-md-12">
            @foreach (['success', 'warning', 'danger'] as $status)
            @if (session($status))
            <div class="alert alert-{{ $status }} alert-dismissible fade show custom-{{ $status }}-box" role="alert">
                <strong>{{ session($status) }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Potongan + Tunjangan</h5>
            <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="{{ url('admin/potongan-tunjangan%Tidak-Masuk') }}" class="nav-link"><i class="bi bi-bookmark-fill"></i> Potongan Tidak Masuk</a>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link  active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="bi bi-bookmark-fill"></i> Potongan BPJS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ url('admin/potongan-tunjangan%Lembur') }}" class="nav-link"><i class="bi bi-bookmark-fill"></i> Fee Lembur</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="{{ url('admin/potongan-tunjangan%Tunjangan') }}" class="nav-link"><i class="bi bi-bookmark-fill"></i> Tunjangan</a>
                </li>
            </ul>
            <div class="tab-content pt-2" id="borderedTabContent">
                <div class="tab-pane fade  show active" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <button type="button" class="btn btn-outline-success float-end mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#ModalTambahbpjs">
                        Tambah Data
                    </button>
                    <table class="table table-bordered">
                        <thead class="bg-dark">
                            <tr>
                                <th scope="col" class="text-center" style="color: white;">NOMINAL</th>
                                <th scope="col" class="text-center" style="color: white;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_bpjs as $bpjs)
                            <tr style="text-align: center;">
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
                                <td>
                                    <div class="btn-group">
                                        <a type="button" href="{{ url('admin/potongan-tunjangan%BPJS', $bpjs->id) }}/edit" class="btn btn-outline-warning"><i class="bi bi-pencil-fill"></i></a>
                                        <form action="{{ url('admin/potongan-tunjangan%BPJS', $bpjs->id) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Data BPJS -->
    <div class="modal fade" id="ModalTambahbpjs" tabindex="-1">
        <div class="modal-dialog modal-m">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Potongan PBJS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/potongan-tunjangan%BPJS') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-">
                                <div class="form-group">
                                    <label for="">Nominal</label>
                                    <div class="form-group">
                                        <select class="custom-select custom-select-lg mb-3 form-control" name="nominal" required>
                                            <option selected> ------ Pilih Opsi ------ </option>
                                            <option value="0.01">1% dari gaji</option>
                                            <option value="0.02">2% dari gaji</option>
                                            <option value="0.03">3% dari gaji</option>
                                            <option value="0.04">4% dari gaji</option>
                                            <option value="0.05">5% dari gaji</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-template.admin>