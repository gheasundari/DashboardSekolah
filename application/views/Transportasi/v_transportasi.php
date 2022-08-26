<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Transportasi</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
					<li class="breadcrumb-item">Dashboard</li>
					<li class="breadcrumb-item active">Transportasi</li>
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
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="card">

				<div class="card-body">
					<div class="d-flex  align-items-center no-block">
						<h4 class="card-title ">Transportasi</h4>
					</div>
					<div class="form-group row">
						<label for="example-search-input" class="col-2 col-form-label">Data Tahun</label>
						<div class="col-10">
							<select class="select2 form-control custom-select" style="width: 50%; height:36px;" name='tahun' onchange="updateChart(this)">
								<option>Pilih Tahun</option>
								<?php foreach ($tahun as $row) { ?>
									<option><?= $row->tahun ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-12">
							<h5 class="mb-3">JUMLAH SISWA BERDASARKAN TRANSPORTASI</h5>
							<h6 class=" mb-3"> TAHUN <span class="text-tahun">2022</span></h6>
							<canvas id="transportasi"></canvas>
						</div>
						<div class="col-lg-6 col-md-12">
							<h5 class="mb-3">PERSENTASE SISWA BERDASARKAN TRANSPORTASI</h5>
							<h6 class=" mb-3"> TAHUN <span class="text-tahun">2022</span></h6>
							<center>
								<canvas id="transportasi_pie"></canvas>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
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
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script>
	jQuery(document).ready(function() {
		$(".select2").select2();
		myChart('bar', 'transportasi', <?= date('Y')  ?>)
		chartPie('pie', 'transportasi_pie', <?= date('Y') ?>)
	});
</script>
<?php include('transportasi_script_dashboard.php') ?>