<div class="sidebar" data-color="dark-green" data-image="{{asset ('assets/img/sidebar-1.jpg') }}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="admin" class="simple-text">
                    Tracking Covid-19
                </a>
            </div>

            <ul class="nav">
                <li class="nav-item active">
                    <a href="#" class="nav-link">
                        <i class="nc-icon nc-chart-bar-32"></i>
                        <p>Kasus Global</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nc-icon nc-square-pin"></i>
                        <p>Country</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Dampak</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link">
                        <i class="nc-icon nc-chart-bar-32"></i>
                        <p>Kasus Indonesia</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('provinsi.index')}}" class="nav-link">
                        <i class="nc-icon nc-square-pin"></i>
                        <p>Provinsi</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('kota.index')}}" class="nav-link">
                        <i class="nc-icon nc-square-pin"></i>
                        <p>Kota / Kabupaten</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('kecamatan.index')}}" class="nav-link">
                        <i class="nc-icon nc-square-pin"></i>
                        <p>Kecamatan</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('kelurahan.index')}}" class="nav-link">
                        <i class="nc-icon nc-square-pin"></i>
                        <p>Desa / Kelurahan</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('rw.index')}}" class="nav-link">
                        <i class="nc-icon nc-square-pin"></i>
                        <p>RW</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('kasus2.index')}}" class="nav-link">
                        <i class="nc-icon nc-single-02"></i>
                        <p>Kasus</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
