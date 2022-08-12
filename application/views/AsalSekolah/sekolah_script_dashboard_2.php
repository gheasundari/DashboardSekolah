<script>
	const baseUrl = "<?= base_url(); ?>"
	// let tahun = $('select[name=tahun] option').filter(':selected').val();
	const myChart = (chartType, canvas, tahun) => {
		$.ajax({
			url: baseUrl + 'C_Sekolah/chartSekolahByYear/' + tahun,
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				var chart = null;
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
				if (chart instanceof Chart) {
					chart.destroy();
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

	function updateChart(option) {
		console.log(option.value);
		myChart('bar', 'siswa', option.value)

	}

	// console.log('tes')
	// console.log()
</script>