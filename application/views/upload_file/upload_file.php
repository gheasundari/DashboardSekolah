<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Upload File | Extract Transform Load (ETL)</h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
					<li class="breadcrumb-item active">Upload File | ETL</li>
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
	<div class="row">
		<div class="col-12">
			<?php if ($this->session->flashdata('success')) { ?>
				<div class="alert alert-success">
					<?= $this->session->flashdata('success') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
			<?php } else if ($this->session->flashdata('error')) {  ?>
				<div class="alert alert-danger">
					<?= $this->session->flashdata('error') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
			<?php } else if ($this->session->flashdata('warning')) {  ?>

				<?php echo $this->session->flashdata('warning'); ?>;

			<?php } else if ($this->session->flashdata('info')) {  ?>

				<?php echo $this->session->flashdata('info'); ?>;

			<?php } ?>
		</div>
		<div class="col-12">
			<div class="card">

				<div class="card-body">
					<form action="<?= base_url('C_ETL/prosesUpload') ?>" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label>Data Tahun</label>
									<div class="form-group">
										<select name="tahun_data" class="custom-select col-12" id="inlineFormCustomSelect" required>
											<option selected>Pilih Tahun</option>
											<?php
											for ($i = date('Y'); $i >= date('Y') - 5; $i--) {
												echo "<option value='$i'";
												if (date('Y') == $i) {
													// echo "selected";
												}
												echo ">$i</option>";
											}
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<label>Upload File Excel</label>
									<div class="form-group">
										<input type="file" class="form-control" id="exampleInputFile" name="fxls" accept=".xls" required />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<button type="submit" class="btn btn-success"><i class="fa fa-upload"></i> Submit</button>
								<button type="reset" class="btn btn-info"><i class="fa fa-refresh"></i> Reset</button>
								<!-- <button type="reset" class="btn btn-dark">Hapus Data</button> -->
								<a href="<?= base_url('DataBenar/Format Benar.xls'); ?>">
									<button type="button" class="btn btn-warning"><i class="fa fa-file-excel-o"></i> Download Format</button>
								</a>
								<a href="<?= base_url('C_ETL/deleteAll'); ?>">
									<button type="button" class="btn btn-danger">Hapus Data</button>
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Data</h4>
					<div class="table-responsive">
						<table class="table color-table purple-table ">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama File</th>
									<th>Data Tahun</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<!-- <?php
										var_dump($tahun[0]->berkas);
										?> -->
								<?php $i = 1;
								foreach ($tahun as $row) { ?>
									<tr>
										<td class="align-middle"><?= $i++ ?></td>
										<td class="align-middle">
											<h4>File Data Tahun <?= $row->data_tahun ?></h4>
											<ul class="">

												<?php
												foreach ($row->berkas as $t) { ?>
													<li><img src=" <?= base_url('assets/icons/microsoft-excel-icon.svg') ?>" width="20px" height="20px" alt="Data Tahun 2019" class="mr-2" />
														<a href="<?= base_url($t->path_file) ?>"><?= $t->file_name ?></a>
													</li>
												<?php } ?>
											</ul>
										</td>
										<td class="align-middle"><?= $row->data_tahun ?></td>
										<td class="align-middle">
											<!-- <a href="<?= base_url($row->path_file) ?>" class="btn btn-warning btn-circle"> <i class="fa fa-download"></i></a> -->
											<a href="<?= base_url('C_ETL/deletebyyear/'.$row->data_tahun)?>">
											<button type="button" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i> </button>
											</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<!-- <?php
								$dirFiles = array();
								$url = 'xls/';
								if ($handle = opendir($url)) {

									while (false !== ($entry = readdir($handle))) {


										if ($entry != "." && $entry != ".." && $entry != "index.php") {
											$dirFiles[] = $entry;
										}
									}

									closedir($handle);
								}

								sort($dirFiles);
								foreach ($dirFiles as $file) {
									echo "<a href=$file>$file</a><br>";
								}
								?> -->
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