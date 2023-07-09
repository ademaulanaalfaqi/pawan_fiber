    <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
        </a><!-- End Notification Icon -->
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
                @foreach ($list_izincuti as $izincuti)
                    @if ($izincuti->status == 1)
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Pengajuan Baru</h4>
                                <p>{{$izincuti->nama}}</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>            
                    @endif
                @endforeach
            <li>
                <hr class="dropdown-divider">
            </li>
        </ul><!-- End Notification Dropdown Items -->
    </li>