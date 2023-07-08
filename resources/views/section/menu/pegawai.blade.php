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
        <a class="nav-link {{checkRouteActive('pegawai/dashboard')}}" href="{{url('pegawai/dashboard')}}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{checkRouteActive('pegawai/absensi')}}" href="{{url('pegawai/absensi')}}">
            <i class="bi bi-calendar-check"></i>
            <span>Absensi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{checkRouteActive('pegawai/lembur')}}" href="{{url('pegawai/lembur')}}">
            <i class="bi bi-clock"></i>
            <span>Lembur</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{checkRouteActive('pegawai/izin-cuti')}}" href="{{url('pegawai/izin-cuti')}}">
            <i class="bi bi-envelope"></i>
            <span>Izin dan Cuti</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{checkRouteActive('pegawai/dinas')}}" href="{{url('pegawai/dinas')}}">
            <i class="bi bi-globe2"></i>
            <span>Dinas</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{checkRouteActive('pegawai/data-gaji')}}" href="{{url('pegawai/data-gaji')}}">
            <i class="bi bi-clipboard2-data"></i>
            <span>Data Gaji</span>
        </a>
    </li>
</ul>