<x-template.admin title="Jabatan + Gaji Pokok">
    <div class="container-fluid">
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
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Daftar Jabatan + Gaji Pokok</h5>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#ModalTambah">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-dark" style="color: white; text-align: center;">
                                        <th>NAMA JABATAN</th>
                                        <th>GAJI POKOK</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_jabatan as $jabatan)
                                    <tr style="text-align: center;">
                                        <td>{{ $jabatan->nama_jabatan }}</td>
                                        <td>Rp. {{number_format($jabatan->gapok)}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a type="button" href="{{ url('admin/jabatan', $jabatan->id) }}/edit" class="btn btn-outline-warning"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="{{ url('admin/jabatan', $jabatan->id) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
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
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{ $list_jabatan->links()}}
            </ul>
        </nav><!-- End Pagination with icons -->
    </div>

    {{-- Tambah Data --}}
    <div class="modal fade" id="ModalTambah" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/jabatan') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Jabatan</label>
                                    <input type="text" class="form-control" name="nama_jabatan" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gaji Pokok</label>
                                    <input type="text" class="form-control" name="gapok" required>
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