@php
    function checkRouteActive($route)
    {
        if (Route::current()->uri == $route) {
            return 'collapsed';
        }
    }
@endphp


<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link {{ checkRouteActive('admin/dashboard') }}" href="{{ url('admin/dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ checkRouteActive('admin/data-pegawai') }} {{ checkRouteActive('admin/data-pegawai{datapegawai}') }} "
            href="{{ url('admin/data-pegawai') }}">
            <i class="bi bi-person"></i>
            <span>Data Pegawai</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ checkRouteActive('admin/absensi') }} {{ checkRouteActive('admin/lokasi_absensi') }}"
            data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Absensi</span><i
                class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('admin/absensi') }}">
                    <i class="bi bi-circle"></i><span>Absen Pegawai</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/lokasi_absensi') }}">
                    <i class="bi bi-circle"></i><span>Lokasi Absensi</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ checkRouteActive('admin/izin-cuti') }}" href="{{ url('admin/izin-cuti') }}">
            <i class="bi bi-envelope"></i>
            <span>Izin dan Cuti</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ checkRouteActive('admin/dinas') }}" href="{{ url('admin/dinas') }}">
            <i class="bi bi-globe2"></i>
            <span>Dinas</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ checkRouteActive('admin/data-pegawai/setting') }}"
            href="{{ url('admin/data-pegawai/setting/divisi') }}">
            <i class="bi bi-gear"></i>
            <span>Setting</span>
        </a>
    </li>

</ul>
