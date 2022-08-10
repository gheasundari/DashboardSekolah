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
				const chartData = {
					labels: chartX,
					datasets: [{
						label: 'Siswa',
						data: chartY,
						// backgroundColor: ['salmon', 'rgba(153, 102, 255)', 'rgba(255, 159, 64)'],
						backgroundColor: ['salmon'],
					}]
				}
				const ctx = document.getElementById(canvas).getContext('2d')
				const config = {
					type: 'bar',
					data: chartData
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
			url: baseUrl + 'C_Dashboard/chartCountGender',
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
				// const ages = [26, 27, 26, 26, 28, 28, 29, 29, 30]
				// const uniqueAges = ages.filter(unique)

				// console.log(uniqueAges)
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
					}, {
						label: 'Perempuan',
						data: chartPR,
						backgroundColor: ['salmon'],
					}]
				}
				const ctx = document.getElementById(canvas).getContext('2d')
				const config = {
					type: 'bar',
					data: chartData
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
					}, {
						label: 'Tidak Menerima',
						data: chartPR,
						backgroundColor: ['orange'],
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
</script>