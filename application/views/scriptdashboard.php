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
						const test = ['salmon', 'red', 'darkcyan']
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
	myChart('bar')
</script>