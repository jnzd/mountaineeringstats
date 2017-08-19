<?php
    
?>
<canvas class="chart" id="elevation" width="400" height="400"></canvas>
<script src="node_modules/chart.js/dist/Chart.js"></script>
<script>
	console.log(<?php echo $elevation_js; ?>);
	var elevation = <?php echo $elevation_js; ?>;
	var ctx = document.getElementById("elevation").getContext('2d');
	var elevationChart = new Chart(ctx, {
    type: 'line',
    data: {
			datasets: [{
				//label: "elevation",
				backgroundColor: "#a8a8a8",
				borderColor: "#919191",
				data: elevation,
			}]
		},
    options: {
			responsive: true,
			scales: {
				xAxes: [{
					display: true,
				}],
			}
		}
	});
	/*var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
			labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
			datasets: [{
				label: '# of Votes',
				data: [12, 19, 3, 5, 2, 3],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
    },
    options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
    }
	});*/
	/*var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
			labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
			datasets: [{
				label: '# of Votes',
				data: [12, 19, 3, 5, 2, 3],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
				],
				borderWidth: 1
		}]
	},
	options: {
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero:true
				}
			}]
		}
	}
});*/
</script>