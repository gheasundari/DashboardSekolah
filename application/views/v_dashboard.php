<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Dashboard</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Start Page Content -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- DASHBOARD 2022 -->
	<!-- ============================================================== -->
	<div id="content">
		<div class="row">
			<!-- JUMLAH SISWA -->
			<div class="col-lg-3 col-md-12">
				<div class="card bg-purple text-white h-70">
					<div class="card-body">
						<p class="light_op_text mb-0"><?= date('Y') - 1 ?></p>
						<h5 class="card-title">Jumlah Siswa</h5>
						<div class="row">
							<div class="col-12">
								<h1 class="text-white"><?= isset($CountSiswaNow->jumlah_siswa) ? $CountSiswaNow->jumlah_siswa : '0' ?> Orang</h1>
								<!-- <p class="light_op_text mb-0">2021</p> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END JUMLAH SISWA -->
			<!-- ASAL SEKOLAH -->
			<div class="col-lg-3 col-md-12">
				<div class="card bg-dark text-white">
					<div class="card-body">
						<p class="light_op_text mb-0"><?= date('Y') - 1 ?></p>
						<h5 class="card-title">Sekolah Terbanyak</h5>
						<div class="row">
							<div class="col-12">
								<h4 class="text-white"><?= isset($CountAsalSekolahNow->nama_sekolah) ? $CountAsalSekolahNow->nama_sekolah : '-';  ?> </h4>
								<p class="light_op_text font-weight-normal mb-0"><?= isset($CountAsalSekolahNow->jumlah_siswa) ? $CountAsalSekolahNow->jumlah_siswa  : '0' ?> Orang</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END ASAL SEKOLAH -->
			<!-- PENERIMA KIP -->
			<div class="col-lg-3 col-md-12">
				<div class="card bg-danger text-white" id="penerimakip">
					<div class="card-body">
						<p class="light_op_text mb-0"><?= date('Y') - 1 ?></p>
						<h5 class="card-title">Penerima KIP</h5>
						<div class="row">
							<div class="col-12">
								<h1 class="text-white"><?= isset($CountPenerimaKipNow->jumlah_kip) ? $CountPenerimaKipNow->jumlah_kip : '0'  ?> Orang</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PENERIMA KIP -->
			<!-- ROMBEL -->
			<div class="col-lg-3 col-md-12">
				<div class="card bg-info text-white">
					<div class="card-body">
						<p class="light_op_text mb-0"><?= date('Y') - 1 ?></p>
						<h5 class="card-title mb-0">Rombel</h5>
						<div class="row">
							<?php
							$i = 0;
							foreach ($CountRombelNow as $row) { ?>
								<div class="col-6">
									<h3 class="text-white font-weight-bold"><?= $row->nama_rombel ?> </h3>
									<h5 class="text-white"><?= $row->jumlah ?> Orang</h5>
								</div>
							<?php if ($i == 2) break;
							} ?>
						</div>
					</div>
				</div>
			</div>
			<!-- END ROMBEL -->
		</div>
		<!-- ============================================================== -->
		<!-- END DASHBOARD 2022 -->
		<!-- ============================================================== -->
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="d-flex  align-items-center no-block">
							<h4 class="card-title ">Jumlah Siswa</h4>
						</div>
						<h6 class="text-muted m-b-20">3 Tahun Terakhir</h6>
						<canvas id="siswa"></canvas>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="d-flex  align-items-center no-block">
							<h4 class="card-title ">Jumlah Siswa <span class="text-muted">(Gender)</span></h4>
						</div>
						<h6 class="text-muted m-b-20">3 Tahun Terakhir</h6>
						<canvas id="gender"></canvas>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="d-flex  align-items-center no-block">
							<h4 class="card-title ">Penerima KIP</h4>
						</div>
						<h6 class="text-muted m-b-20">3 Tahun Terakhir</h6>
						<canvas id="kip"></canvas>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="d-flex  align-items-center no-block">
							<h4 class="card-title ">Rombel</h4>
						</div>
						<h6 class="text-muted m-b-20">3 Tahun Terakhir</h6>
						<canvas id="rombel"></canvas>
					</div>
				</div>
			</div>
			<!-- <div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-body">
				<canvas id="myChart"></canvas> -->

			<!-- <h1>TEST CHART</h1> -->
			<!-- <div class="row mt-4">
						<div class="col-12"></div>
						<canvas id="line" height="100"></canvas>
					</div>
					<div class="row mt-2">
						<div class="col-8"></div>

						<div class="col-4"></div>
						<canvas id="pie"></canvas>
					</div>
				</div>
			</div>
		</div> -->
		</div>

		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Right sidebar -->
		<!-- ============================================================== -->
		<!-- .right-sidebar -->
		<div class="right-sidebar">
			<div class="slimscrollright">
				<div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
				<div class="r-panel-body">
					<ul id="themecolors" class="m-t-20">
						<li><b>With Light sidebar</b></li>
						<li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
						<li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
						<li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
						<li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
						<li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
						<li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
						<li class="d-block m-t-30"><b>With Dark sidebar</b></li>
						<li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme working">7</a></li>
						<li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
						<li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
						<li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
						<li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
						<li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
					</ul>
					<ul class="m-t-20 chatonline">
						<li><b>Chat option</b></li>
						<li>
							<a href="javascript:void(0)"><img src="<?= base_url('assets/images/users/1.jpg') ?>" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="<?= base_url('assets/images/users/2.jpg') ?>" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="<?= base_url('assets/images/users/3.jpg') ?>" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="<?= base_url('assets/images/users/4.jpg') ?>" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="<?= base_url('assets/images/users/5.jpg') ?>" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="<?= base_url('assets/images/users/6.jpg') ?>" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="<?= base_url('assets/images/users/7.jpg') ?>" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
						</li>
						<li>
							<a href="javascript:void(0)"><img src="<?= base_url('assets/images/users/8.jpg') ?>" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Right sidebar -->
		<!-- ============================================================== -->
	</div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<?php include('scriptdashboard.php') ?>