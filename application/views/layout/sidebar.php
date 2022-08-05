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
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Steave Gection <span class="caret"></span></a>
                    <div class="dropdown-menu animated flipInY">
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                        <!-- text-->
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="pages-login.html" class="dropdown-item"><i class="fas fa-power-off"></i> Logout</a>
                        <!-- text-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- <li class="nav-small-cap">--- PERSONAL</li>-->
                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard <span class="badge badge-pill badge-cyan ml-auto">10</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="index.html">Asal Sekolah </a></li>
                        <li><a href="index2.html">Jenis Kelamin</a></li>
                        <li><a href="index3.html">Rombel</a></li>
                        <li><a href="index4.html">Agama</a></li>
                        <li><a href="index5.html">Penerima KIP</a></li>
                        <li><a href="index6.html">Tempat Tanggal Lahir</a></li>
                        <li><a href="index7.html">Jenis Tempat Tinggal</a></li>
                        <li><a href="index8.html">Pendamping</a></li>
                        <li><a href="index9.html">Alat Transportasi</a></li>
                        <li><a href="index10.html">Alamat</a></li>
                    </ul>
                </li>
                <li> <a class="waves-effect waves-dark" href="<?= base_url('C_ETL/index') ?>" aria-expanded="false"><i class="ti-files"></i><span class="hide-menu">Upload File</span></span></a></li>
                <li> <a class="waves-effect waves-dark" href="<?= base_url('dashboard') ?>" aria-expanded="false"><i class="fa fa-circle-o text-danger"></i><span class="hide-menu">Log Out</span></a></li>
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