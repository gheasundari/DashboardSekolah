<script>
	const baseUrl = "<?= base_url(); ?>"
	const myChart = (chartType, canvas, tahun) => {
		$.ajax({
			url: baseUrl + 'C_JenisKelamin/chartSexByYear/' + tahun,
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				var chart = null;
				let chartX = []
				let chartY = []
				data.map(data => {
					chartX.push(data.jenis_kelamin)
					chartY.push(data.jumlah_siswa)

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
						layout: {
							padding: 23
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
				chart = new Chart(ctx, config)
				// chart.update();
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}

		})
	}
	const chartPie = (chartType, canvas, tahun) => {
		$.ajax({
			url: baseUrl + 'C_JenisKelamin/chartSexByYear/' + tahun,
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				var chart = null;
				let chartX = []
				let chartY = []
				data.map(data => {
					chartX.push(data.jenis_kelamin)
					chartY.push(data.jumlah_siswa)

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
								size: 15
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
						responsive: false,
						showScale: false,
						maintainAspectRatio: false,
						tooltips: {
							enabled: false
						},
						layout: {
							padding: 23
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
								display: false
							}
						},
						// scales: {
						// 	y: {
						// 		beginAtZero: true,
						// 	},
						// 	x: {
						// 		ticks: {
						// 			autoSkip: false,
						// 			font: {
						// 				size: 15,
						// 			}
						// 		},
						// 		beginAtZero: true,
						// 	},
						// },
					},
					plugins: [ChartDataLabels],
				}
				chart = new Chart(ctx, config)
				// chart.update();
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}

		})
	}
</script>