<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?= base_url('user') ?>" class="site_title"><i class="fas fa-fw fa-user-alt" style="border: 0px solid black;"></i> <span>Administrator</span></a>
        </div>
        <br>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section" style="margin-top: 80px;">

                <ul class="nav side-menu">


                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/lokasi') ?>">
                            <i class="fas fa-fw fa-map-marked-alt"></i>
                            <span>Lokasi</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/galeri') ?>">
                            <i class="fas fa-fw fa-images"></i>
                            <span>Galeri</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/video') ?>">
                            <i class="fas fa-fw fa-video"></i>
                            <span>Video</span></a>
                    </li>

                    <li><a><i class="fab fa-fw fa-get-pocket"></i> Fasilitas</a>
                        <ul class="nav child_menu">
                            <li><a href="<?= base_url('user/fasilitas') ?>">Maps</a></li>
                            <li><a href="<?= base_url('user/fasilitasdata') ?>">Data</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/pengunjung') ?>">
                            <i class="fas fa-fw fa-users"></i>
                            <span>Pengunjung</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            <span>Logout</span></a>
                    </li>
                </ul>


            </div>


        </div>
        <!-- /sidebar menu -->
    </div>
</div>