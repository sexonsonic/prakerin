<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/dist/img/avatar5.png') }}" alt="TrackingCovid-19"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TrackingCovid-19</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-1">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa fa-flag"></i>
                        <p>
                            Kasus Indonesia
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('provinsi.index') }}" class="nav-link ">
                                <i class="fas fa-map-marker text-warning nav-icon"></i>
                                <p>Provinsi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kota.index') }}" class="nav-link">
                                <i class="fas fa-map-marker text-info nav-icon"></i>
                                <p>Kota</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kecamatan.index') }}" class="nav-link">
                                <i class="fas fa-map-marker text-success nav-icon"></i>
                                <p>Kecamatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kelurahan.index') }}" class="nav-link">
                                <i class="fas fa-map-marker text-danger nav-icon"></i>
                                <p>Kelurahan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rw.index') }}" class="nav-link">
                                <i class="fas fa-map-marker text-warning nav-icon"></i>
                                <p>Rw</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rt.index') }}" class="nav-link">
                                <i class="fas fa-map-marker text-warning nav-icon"></i>
                                <p>RT</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kasus2.index') }}" class="nav-link">
                                <i class="far fa-circle text-primary nav-icon"></i>
                                <p>Kasus Local</p>
                            </a>
                        </li>
                    </ul>
                </li>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
