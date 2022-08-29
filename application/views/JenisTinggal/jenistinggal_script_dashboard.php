<script>
	const baseUrl = "<?= base_url(); ?>"
	var chartBar = null;
	const backgroundColor = ['rgba(153, 102, 255)', 'salmon', 'orange', 'rgb(255, 217, 61)'];
	const myChart = (chartType, canvas, tahun) => {
		$.ajax({
			url: baseUrl + 'C_JenisTinggal/chartJenisTinggalByYear/' + tahun,
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				var chart = null;
				let chartX = []
				let chartY = []
				data.map(data => {
					chartX.push(data.jenis_tinggal)
					chartY.push(data.jumlah)

				})
				const chartData = {
					labels: chartX,
					datasets: [{
						// label: ['Siswa'],
						data: chartY,
						backgroundColor: backgroundColor,
						// backgroundColor: ['salmon'],
						datalabels: {
							color: backgroundColor,
							anchor: 'end',
							align: 'top',
							backgroundColor: backgroundColor,
							borderRadius: 5,
							font: {
								weight: 'bold'
							},
							padding: 4,
							color: 'white',
						}
					}]
				}
				const ctx = document.getElementById(canvas).getContext('2d')
				const config = {
					type: chartType,
					data: chartData,
					options: {
						responsive: true,
						showScale: true,
						maintainAspectRatio: true,
						layout: {
							padding: {
								top: 20
							},
						},
						plugins: {
							legend: {
								display: false
							}
						},
						scales: {
							y: {
								beginAtZero: true,
							},
							x: {
								ticks: {
									autoSkip: false,
									// maxRotation: 90,
									// minRotation: 80,
									font: {
										size: 9,
									}
								},
								beginAtZero: true,
							},
						},
					},
					plugins: [ChartDataLabels],
				}
				chartBar = new Chart(ctx, config)
				// chart.update();
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}

		})
	}

	var chartPersen = null;
	const chartPie = (chartType, canvas, tahun) => {
		$.ajax({
			url: baseUrl + 'C_JenisTinggal/chartJenisTinggalByYear/' + tahun,
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				var chart = null;
				let chartX = []
				let chartY = []
				data.map(data => {
					chartX.push(data.jenis_tinggal)
					chartY.push(data.jumlah)

				})
				const chartData = {
					labels: chartX,
					datasets: [{
						// label: ['Siswa'],
						data: chartY,
						backgroundColor: backgroundColor,
						// backgroundColor: ['salmon'],
						datalabels: {
							color: backgroundColor,
							backgroundColor: 'white',
							borderRadius: 5,
							// font: {
							// 	weight: 'bold',
							// 	// size: 15
							// },
						}
					}]
				}
				const ctx = document.getElementById(canvas).getContext('2d')
				const config = {
					type: chartType,
					data: chartData,
					options: {
						responsive: true,
						showScale: true,
						maintainAspectRatio: false,
						tooltips: {
							enabled: true
						},
						plugins: {
							datalabels: {
								formatter: (value, ctx) => {
									let sum = 0;
									let dataArr = ctx.chart.data.datasets[0].data;
									dataArr.map(data => {
										sum += parseInt(data);
									});
									let percentage = (value * 100 / sum).toFixed(2) + "%";
									return percentage;
								},
								color: '#fff',
							},
							legend: {
								display: true
							}
						},
					},
					plugins: [ChartDataLabels],
				}
				chartPersen = new Chart(ctx, config)
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}

		})
	}

	function updateChart(option) {
		var tahunpilihan = option.value;
		const text_tahun = $(".text-tahun");
		const jumlahsiswa = $("#jumlahsiswa");
		text_tahun.text(tahunpilihan);
		$.ajax({
			url: baseUrl + 'C_JenisTinggal/countSiswa/' + tahunpilihan,
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log("data tahun", data);
				jumlahsiswa.text(data.jumlah_siswa)

			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}

		})
		chartBar.destroy();
		chartPersen.destroy();

		myChart('bar', 'jenistinggal', tahunpilihan)
		chartPie('pie', 'jenistinggal_pie', tahunpilihan)
	}
</script>