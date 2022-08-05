<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Dashboard Tahun <?= date('Y') ?></h4>
		</div>
		<div class="col-md-7 align-self-center text-right">
			<div class="d-flex justify-content-end align-items-center">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
				<button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
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
			<div class="card">
				<div class="card-body">
					<canvas id="myChart"></canvas>

					<h1>TEST CHART</h1>
					<div class="row mt-4">
						<div class="col-12"></div>
						<canvas id="line" height="100"></canvas>
					</div>
					<div class="row mt-2">
						<div class="col-8"></div>
						<canvas id="bar"></canvas>
						<div class="col-4"></div>
						<canvas id="pie"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div>
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
	const baseUrl = "<?php echo base_url(); ?>"
	const myChart = (chartType) => {
		$.ajax({
			url: baseUrl + 'C_Dashboard/chartCountSiswaByYear',
			dataType: 'json',
			method: 'get',
			success: data => {
				let chartX = []
				let chartY = []
				data.map(data => {
					chartX.push(data.tahun)
					chartY.push(data.jumlah_siswa)

				})
				// console.log(data);


				const chartData = {
					labels: chartX,
					datasets: [{
						label: 'Sales',
						data: chartY,
						backgroundColor: ['lightcoral'],
						borderColor: ['lightcoral'],
						borderWidth: 4

					}]
				}
				const ctx = document.getElementById(chartType).getContext('2d')
				const config = {
					type: chartType,
					data: chartData
				}
				switch (chartType) {
					case 'pie':
						const pieColor = ['salmon', 'red', 'green', 'blue', 'aliceblue', 'pink', 'orange', 'gold', 'plum', 'darkcyan', 'wheat', 'silver']
						chartData.datasets[0].backgroundColor = pieColor
						chartData.datasets[0].borderColor = pieColor
						break;
					case 'bar':
						chartData.datasets[0].backgroundColor = ['skyblue']
						chartData.datasets[0].borderColor = ['skyblue']
						break;
					default:
						config.options = {
							scales: {
								y: {
									beginAtZero: true
								}
							}
						}
				}
				const chart = new Chart(ctx, config)
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		})
	}

	// myChart('pie')
	// myChart('line')
	myChart('bar')
</script>