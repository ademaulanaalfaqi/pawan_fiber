<x-template.admin title="Dashboard Admin">
    <div class="pagetitle">
    <h1>Welcome {{request()->user()->nama}}</h1>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Izin dan Cuti <span>| Total</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$total}}</h6>
                                    <span class="text-success small pt-1 fw-bold">12%</span>
                                    <span class="text-muted small pt-2 ps-1">Pawan Fiber</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Izin dan Cuti <span>| Diterima</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$diterima}}</h6>
                                    <span class="text-success small pt-1 fw-bold">8%</span>
                                    <span class="text-muted small pt-2 ps-1">Pawan Fiber</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Izin dan Cuti <span>| Ditolak</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{$ditolak}}</h6>
                                    <span class="text-danger small pt-1 fw-bold">12%</span>
                                    <span class="text-muted small pt-2 ps-1">Pawan Fiber</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-template.admin>