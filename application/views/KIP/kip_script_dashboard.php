<script>
	const baseUrl = "<?= base_url(); ?>"
	var chartBar = null;
	const myChart = (chartType, canvas, tahun) => {
		$.ajax({
			url: baseUrl + 'C_KIP/chartKIPByYear/' + tahun,
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				var chart = null;
				let chartX = []
				let chartY = []
				data.map(data => {
					chartX.push(data.penerimakip == 'Ya' ? "Menerima" : "Tidak Menerima")
					chartY.push(data.jumlah_kip)

				})
				const backgroundColor = ['rgba(153, 102, 255)', 'salmon'];
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
						// maintainAspectRatio: true,
						layout: {
							padding: 20
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
									font: {
										size: 15,
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
			url: baseUrl + 'C_KIP/chartKIPByYear/' + tahun,
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				var chart = null;
				let chartX = []
				let chartY = []
				data.map(data => {
					chartX.push(data.penerimakip == 'Ya' ? "Menerima" : "Tidak Menerima")
					chartY.push(data.jumlah_kip)

				})
				const backgroundColor = ['rgba(153, 102, 255)', 'salmon'];
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
							font: {
								weight: 'bold',
								// size: 15
							},
							padding: 5,
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
						scales: {
							// y: {
							// 	beginAtZero: true,
							// },
							// x: {
							// 	ticks: {
							// 		autoSkip: false,
							// 		font: {
							// 			size: 15,
							// 		}
							// 	},
							// 	beginAtZero: true,
							// },
						},
					},
					plugins: [ChartDataLabels],
				}
				chartPersen = new Chart(ctx, config)
				// chart.update();
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}

		})
	}

	function updateChart(option) {
		var tahunpilihan = option.value;
		// myChart.tahun = option.value
		const text_tahun = $(".text-tahun");
		const jumlahsiswa = $("#jumlahsiswa");
		text_tahun.text(tahunpilihan);
		$.ajax({
			url: baseUrl + 'C_KIP/countSiswa/' + tahunpilihan,
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
		text_tahun.text(tahunpilihan);

		chartBar.destroy();
		chartPersen.destroy();

		myChart('bar', 'kip', tahunpilihan)
		chartPie('pie', 'kip_pie', tahunpilihan)
	}
</script>