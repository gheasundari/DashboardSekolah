<script>
	const baseUrl = "<?php echo base_url(); ?>"
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
					// // let tahun = data.tahun;
					// console.log(typeof(data.tahun))
					// // console.log('a' + data.tahun)
					// console.log((data.tahun in chartX))
					// // if ((tahun in chartX) == false) {
					// // 
					// // }
					labelTahun.add(data.tahun)
					if (data.jenis_kelamin == 'Laki-laki')
						chartLK.push(data.jumlah_siswa)
					else
						chartPR.push(data.jumlah_siswa)
				})

				let chartX = Array.from(labelTahun)
				// const test = ['salmon', 'red', 'orange']
				const chartData = {
					labels: chartX,
					datasets: [{
						label: 'Laki',
						data: chartLK,
						backgroundColor: ['salmon'],
						// borderColor: ['lightcoral'],
						// borderWidth: 1
					}, {
						label: 'Perempuan',
						data: chartPR,
						backgroundColor: ['orange'],
						// borderColor: ['lightcoral'],
						// borderWidth: 1
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
	myChart('bar', 'siswa')
	myChartGender('bar', 'gender')
</script>