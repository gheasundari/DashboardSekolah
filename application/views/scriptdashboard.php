<script>
	const baseUrl = "<?= base_url(); ?>"
	let tahun = <?= date('Y') - 3 ?>;
	const unique = (value, index, self) => {
		return self.indexOf(value) === index
	}
	const myChart = (chartType, canvas) => {
		$.ajax({
			url: baseUrl + 'C_Dashboard/chartCountSiswaByThreeYear',
			dataType: 'json',
			method: 'get',
			success: data => {
				let chartX = []
				let chartY = []
				data.map(data => {
					chartX.push(data.tahun)
					chartY.push(data.jumlah_siswa)

				})
				const backgroundColor = ['salmon', 'rgba(153, 102, 255)', 'rgba(255, 159, 64)'];
				const chartData = {
					labels: chartX,
					datasets: [{
						label: ['Siswa'],
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
								beginAtZero: true
							}
						}
					},
					plugins: [ChartDataLabels],
				}
				const chart = new Chart(ctx, config)
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}

		})
	}

	const myChartGender = (chartType, canvas) => {
		$.ajax({
			url: baseUrl + 'C_Dashboard/chartCountGenderByYear',
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				let labelTahun = new Set()
				let chartLK = []
				let chartPR = []

				data.map(data => {
					labelTahun.add(data.tahun)
					if (data.jenis_kelamin == 'Laki-laki')
						chartLK.push(data.jumlah_siswa)
					else
						chartPR.push(data.jumlah_siswa)
				})

				let chartX = Array.from(labelTahun)
				const chartData = {
					labels: chartX,
					datasets: [{
						label: 'Laki',
						data: chartLK,
						backgroundColor: ['rgb(77, 150, 255)'],
						// backgroundColor: ['salmon'],
						datalabels: {
							color: ['rgb(77, 150, 255)'],
							anchor: 'end',
							align: 'top',
							backgroundColor: ['rgb(77, 150, 255)'],
							borderRadius: 5,
							font: {
								weight: 'bold'
							},
							padding: 4,
							color: 'white'
						}
					}, {
						label: 'Perempuan',
						data: chartPR,
						backgroundColor: ['salmon'],
						datalabels: {
							color: ['salmon'],
							anchor: 'end',
							align: 'top',
							backgroundColor: ['salmon'],
							borderRadius: 5,
							font: {
								weight: 'bold'
							},
							padding: 4,
							color: 'white'
						}
					}],

				}
				const ctx = document.getElementById(canvas).getContext('2d')
				const config = {
					type: 'bar',
					data: chartData,
					options: {
						plugins: {
							legend: {
								display: true
							}
						},
						scales: {
							y: {
								beginAtZero: true
							}
						}
					},
					plugins: [ChartDataLabels],
				}
				const chart = new Chart(ctx, config)
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		})
	}

	const myChartKip = (chartType, canvas) => {
		$.ajax({
			url: baseUrl + 'C_Dashboard/chartCountKipByThreeYear',
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				let labelTahun = new Set()
				let chartLK = []
				let chartPR = []
				data.map(data => {
					labelTahun.add(data.tahun)
					if (data.penerimakip == 'Ya')
						chartLK.push(data.jumlah_penerimakip)
					else
						chartPR.push(data.jumlah_penerimakip)
				})

				let chartX = Array.from(labelTahun)
				// const test = ['salmon', 'red', 'orange']
				const chartData = {
					labels: chartX,
					datasets: [{
						label: 'Menerima',
						data: chartLK,
						backgroundColor: ['salmon'],
						datalabels: {
							font: {
								weight: 'bold'
							},
							padding: 4,
							color: 'white'
						}
					}, {
						label: 'Tidak Menerima',
						data: chartPR,
						backgroundColor: ['orange'],
						datalabels: {
							font: {
								weight: 'bold'
							},
							padding: 4,
							color: 'white'
						}
					}]
				}

				const ctx = document.getElementById(canvas).getContext('2d')
				const chart = new Chart(ctx, {
					// options: {
					// 	// ...
					// }
					type: 'bar',
					data: chartData,
					options: {
						indexAxis: 'y',
						plugins: {
							legend: {
								display: true
							}
						},
						scales: {
							y: {
								beginAtZero: true
							}
						}
					},
					plugins: [ChartDataLabels],
					// options: {}
				})
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		})
	}

	const myChartRombel = (chartType, canvas) => {
		$.ajax({
			url: baseUrl + 'C_Dashboard/chartCountRombelByYear',
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				let labelTahun = new Set()
				let chartMIPA = []
				let chartIPS = []
				data.map(data => {
					labelTahun.add(data.tahun)
					if (data.rombel == 'MIPA')
						chartMIPA.push(data.jumlah)
					else
						chartIPS.push(data.jumlah)
				})

				let chartX = Array.from(labelTahun)
				// const test = ['salmon', 'red', 'orange']
				const chartData = {
					labels: chartX,
					datasets: [{
						label: 'MIPA',
						data: chartMIPA,
						backgroundColor: ['salmon'],
						datalabels: {
							font: {
								weight: 'bold'
							},
							padding: 4,
							color: 'white'
						}
					}, {
						label: 'IPS',
						data: chartIPS,
						backgroundColor: ['orange'],
						datalabels: {
							font: {
								weight: 'bold'
							},
							padding: 4,
							color: 'white'
						}
					}]
				}

				const ctx = document.getElementById(canvas).getContext('2d')
				const chart = new Chart(ctx, {
					// options: {
					// 	// ...
					// }
					type: 'bar',
					data: chartData,
					options: {
						indexAxis: 'y',
						plugins: {
							legend: {
								display: true
							}
						},
						scales: {
							y: {
								beginAtZero: true
							}
						}
					},
					plugins: [ChartDataLabels],
					// options: {}
				})
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		})
	}
	
	myChart('bar', 'siswa')
	myChartGender('bar', 'gender')
	myChartKip('bar', 'kip')
	myChartRombel('bar', 'rombel')
</script>