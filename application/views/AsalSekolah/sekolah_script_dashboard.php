<script>
	const baseUrl = "<?= base_url(); ?>"
	var chart = null;
	const myChart = (chartType, canvas, tahun) => {
		$.ajax({
			url: baseUrl + 'C_Sekolah/chartSekolahByYear/' + tahun,
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				if (chart instanceof Chart) {
					chart.destroy();
				}
				let chartX = []
				let chartY = []
				data.map(data => {
					chartX.push(data.nama_sekolah)
					chartY.push(data.jumlah)
				})
				const backgroundColor = ['salmon', 'rgba(153, 102, 255)', 'rgba(255, 159, 64)'];
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
					type: 'bar',
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
									maxRotation: 90,
									minRotation: 80,
									font: {
										size: 8,
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

	var chartTop = null;
	const ChartTop = (chartType, canvas, tahun) => {
		$.ajax({
			url: baseUrl + 'C_Sekolah/chartTopAsalSekolah/' + tahun,
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				let chartX = []
				let chartY = []
				data.map(data => {
					chartX.push(data.nama_sekolah)
					chartY.push(data.jumlah_siswa)

				})
				const backgroundColor = ['salmon', 'rgba(153, 102, 255)', 'rgba(255, 159, 64)'];
				const chartData = {
					labels: chartX,
					datasets: [{
						// label: ['Siswa'],
						data: chartY,
						backgroundColor: backgroundColor,
						// backgroundColor: ['salmon'],
						datalabels: {
							color: backgroundColor,
							// anchor: 'end',
							// align: 'top',
							backgroundColor: 'white',
							borderRadius: 10,
							font: {
								weight: 'bold'
							},
							padding: {
								top: 6,
								bottom: 5,
								right: 10,
								left: 10
							},
						}
					}]
				}
				const ctx = document.getElementById(canvas).getContext('2d')
				const config = {
					type: 'bar',
					data: chartData,

					options: {
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
								grid: {
									offset: false
								},
								ticks: {
									min: 0,
								}

							},
							x: {
								ticks: {
									autoSkip: false,
									maxRotation: 80,
									minRotation: 20,
									font: {
										size: 10,
									}
								},
								beginAtZero: true,
							},
						},
					},
					plugins: [ChartDataLabels],
				}

				chartTop = new Chart(ctx, config)
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
			url: baseUrl + 'C_Sekolah/countSiswa/' + tahunpilihan,
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

		chart.destroy();
		chartTop.destroy();

		myChart('line', 'siswa', tahunpilihan);
		ChartTop('bar', 'topSekolah', tahunpilihan);
	}
</script>