<script>
	function getRandomIntInclusive(min, max) {
		min = Math.ceil(min);
		max = Math.floor(max);
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}

	// create initial empty chart
	var ctx_live = document.getElementById('siswa').getContext('2d');

	var myChart = new Chart(ctx_live, canvas) {
	type: 'bar',
	data: {
		labels: ['ayam'],
		datasets: [{
			data: ['2', '3'],
			borderWidth: 1,
			borderColor: '#00c0ef',
			label: 'liveCount',
		}]
	},
	options: {
		responsive: true,
		title: {
			display: true,
			text: "Chart.js - Dynamically Update Chart Via Ajax Requests",
		},
		layout: {
			padding: 23
		},
		plugins: {
			legend: {
				display: true
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
	options: {
		responsive: true,
		title: {
			display: true,
			text: "Chart.js - Dynamically Update Chart Via Ajax Requests",
		},
		legend: {
			display: false
		},
		scales: {
			y: [{
				ticks: {
					beginAtZero: true,
				}
			}]
		}
	}
	});

	// this post id drives the example data
	var postId = 1;
	const baseUrl = "<?= base_url(); ?>"
	var tahun = <?= date('Y') - 3 ?>
	// logic to get new data
	var getData = function() {
		$.ajax({
			url: baseUrl + 'C_Sekolah/chartSekolahByYear/' + tahun,
			dataType: 'json',
			method: 'get',
			success: function(data) {
				console.log(data)
				// process your data to pull out what you plan to use to update the chart
				// e.g. new label and a new data point
				let chartX = []
				let chartY = []
				data.map(data => {
					chartX.push(data.nama_sekolah)
					chartY.push(data.jumlah)

				})
				// add new label and data point to chart's underlying data structures
				myChart.data.labels.push(['jumlah']);
				myChart.data.datasets[0].data.push(['120', '12']);

				// re-render the chart
				myChart.update();
			}
		});
	};

	// get new data every 3 seconds
	// setInterval(getData, 3000);


	// let tahun = $('select[name=tahun] option').filter(':selected').val();
	// const myChart = (chartType, canvas, tahun) => {
	// 	$.ajax({
	// 		url: baseUrl + 'C_Sekolah/chartSekolahByYear/' + tahun,
	// 		dataType: 'json',
	// 		method: 'get',
	// 		success: data => {
	// 			console.log(data);
	// 			var chart = null;
	// 			let chartX = []
	// 			let chartY = []
	// 			data.map(data => {
	// 				chartX.push(data.nama_sekolah)
	// 				chartY.push(data.jumlah)

	// 			})
	// 			const backgroundColor = ['salmon', 'rgba(153, 102, 255)', 'rgba(255, 159, 64)'];
	// 			const chartData = {
	// 				labels: chartX,
	// 				datasets: [{
	// 					// label: ['Siswa'],
	// 					data: chartY,
	// 					backgroundColor: backgroundColor,
	// 					// backgroundColor: ['salmon'],
	// 					datalabels: {
	// 						color: backgroundColor,
	// 						anchor: 'end',
	// 						align: 'top',
	// 						backgroundColor: backgroundColor,
	// 						borderRadius: 5,
	// 						font: {
	// 							weight: 'bold'
	// 						},
	// 						padding: 4,
	// 						color: 'white',
	// 					}
	// 				}]
	// 			}
	// 			const ctx = document.getElementById(canvas).getContext('2d')
	// 			const config = {
	// 				type: 'bar',
	// 				data: chartData,
	// 				options: {
	// 					layout: {
	// 						padding: 23
	// 					},
	// 					plugins: {
	// 						legend: {
	// 							display: false
	// 						}
	// 					},
	// 					scales: {
	// 						y: {
	// 							beginAtZero: true,
	// 						},
	// 						x: {
	// 							ticks: {
	// 								autoSkip: false,
	// 								maxRotation: 90,
	// 								minRotation: 80,
	// 								font: {
	// 									size: 8,
	// 								}
	// 							},
	// 							beginAtZero: true,
	// 						},
	// 					},
	// 				},
	// 				plugins: [ChartDataLabels],
	// 			}
	// 			if (chart instanceof Chart) {
	// 				chart.destroy();
	// 			}
	// 			chart = new Chart(ctx, config)
	// 			// chart.update();
	// 		},
	// 		error: function(xhr, ajaxOptions, thrownError) {
	// 			alert(xhr.status);
	// 			alert(thrownError);
	// 		}

	// 	})
	// }

	// function updateChart(option) {
	// 	console.log(option.value);
	// 	myChart('bar', 'siswa', option.value)

	// }

	// console.log('tes')
	// console.log()
</script>