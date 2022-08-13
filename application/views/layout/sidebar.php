<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div><img src="<?= base_url('assets/images/users/2.jpg') ?>" alt="user-img" class="img-circle"></div>
                <div class="dropdown">
                    <a href="" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Steave Gection <span class="caret"></span></a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="pages-login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        <!-- text-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> <a class="waves-effect waves-dark" href="<?= base_url('dashboard') ?>" aria-expanded="false"><i class="icon-home"></i><span class="hide-menu">Beranda</span></span></a></li>
                <!-- <li class="nav-small-cap">--- PERSONAL</li>-->
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard <span class="badge badge-pill badge-cyan ml-auto">10</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= base_url('dashboard/asalsekolah') ?>">Asal Sekolah </a></li>
                        <li><a href="<?= base_url('dashboard/jeniskelamin') ?>">Jenis Kelamin</a></li>
                        <li><a href="<?= base_url('dashboard/rombel') ?>">Rombel</a></li>
                        <li><a href="<?= base_url('dashboard/agama') ?>">Agama</a></li>
                        <li><a href="index5.html">Penerima KIP</a></li>
                        <li><a href="index7.html">Jenis Tempat Tinggal</a></li>
                        <li><a href="index9.html">Alat Transportasi</a></li>
                    </ul>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= base_url('etl') ?>" aria-expanded="false"><i class="ti-files"></i><span class="hide-menu">Upload File</span></span></a></li>
                <li> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-circle-o text-danger"></i><span class="hide-menu">Log Out</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">