<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('Admin.dashboard')}}" class="brand-link">
        <img src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Clinic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('Admin.profile.show' , Auth::guard('admin')->user()->id )}}" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('Admin.dashboard')}}" class="nav-link {{request()->routeIs('Admin.dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">MAJORS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.major.*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Majors
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.major.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Majors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.major.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Major</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">DOCTORS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.doctor.*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Doctors
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.doctor.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Doctors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.doctor.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Doctor</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">RESERVATIONS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.reservation.*') ? 'active' : ''}}">
                        <i class="bi bi-calendar-check mr-2"></i>
                        <p>
                            Reservations
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.reservation.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Reservations</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.reservation.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Reservation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">USERS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.user.*') ? 'active' : ''}}">
                        <i class="bi bi-people-fill"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.user.index')}}" class="nav-link">
                                <i class="bi bi-people-fill"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.user.create')}}" class="nav-link">
                                <i class="bi bi-person-fill-add"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">ADMINS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.admin.*') ? 'active' : ''}}">
                        <i class="bi bi-people-fill"></i>
                        <p>
                            Admins
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.admin.index')}}" class="nav-link">
                                <i class="bi bi-people-fill"></i>
                                <p>All Admins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.admin.create')}}" class="nav-link">
                                <i class="bi bi-person-fill-add"></i>
                                <p>Create Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">PAGES</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.contact') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.contact')}}" class="nav-link">
                                <i class="bi bi-chat-dots-fill"></i>
                                <p>All Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.profile.show' , Auth::guard('admin')->user()->id )}}" class="nav-link">
                                <i class="bi bi-person-circle"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">AUTH</li>
                <li class="nav-item">
                    <a href="{{route('Admin.logout')}}" class="nav-link">
                        <i class="bi bi-box-arrow-right"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>