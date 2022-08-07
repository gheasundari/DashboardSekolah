<script>
	const baseUrl = "<?php echo base_url(); ?>"
	const myChart = (chartType, canvas) => {
		$.ajax({
			url: baseUrl + 'C_Dashboard/chartCountGenderByYear',
			dataType: 'json',
			method: 'get',
			success: data => {
				console.log(data);
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
						backgroundColor: ['lightcoral'],
						// borderColor: ['lightcoral'],
						// borderWidth: 1
					}]
				}
				const ctx = document.getElementById(canvas).getContext('2d')
				const config = {
					type: 'bar',
					data: chartData
				}
				switch (chartType) {
					case 'pie':
						const pieColor = ['salmon', 'red', 'green', 'blue', 'aliceblue', 'pink', 'orange', 'gold', 'plum', 'darkcyan', 'wheat', 'silver']
						chartData.datasets[0].backgroundColor = pieColor
						chartData.datasets[0].borderColor = pieColor
						break;
					case 'bar':
						const test = ['salmon', 'aliceblue', 'orange']
						chartData.datasets[0].backgroundColor = test
						chartData.datasets[0].borderColor = test
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
	myChart('bar', 'siswa')
	myChart('bar', 'gender')
</script>