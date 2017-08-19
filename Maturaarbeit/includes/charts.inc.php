<?php
    
?>
<canvas class="chart" id="elevation" width="10000" height="10000"></canvas>
<script src="node_modules/chart.js/dist/Chart.js"></script>
<script>
	var elevation = <?php echo $elevation_js; ?>;
	var time = <?php echo $time_js; ?>;
	Array.prototype.max = function() {
    return Math.max.apply(null, this);
  };
  Array.prototype.min = function() {
    return Math.min.apply(null, this);
  };
	var elevationMax = elevation.max();
	var elevationMin = elevation.min();
	console.log(elevationMax);
	console.log(elevationMin);
	var difference = elevationMax-elevationMin;
	var yAxisMin = Math.round((elevationMin-difference/10)/10)*10;
	var yAxisMax = Math.round((elevationMax+difference/10/10)/10)*10;
	var height = yAxisMax-yAxisMin;
	console.log(yAxisMax);
	console.log(yAxisMin);
	console.log(elevation);
	var ctx = document.getElementById("elevation").getContext('2d');
	var elevationChart = new Chart(ctx, {
		type: 'line',
    data: {
			datasets: [{
				label: "elevation",
				borderColor: "#919191",
				data: elevation,
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: false,
						min: yAxisMin,
						max: yAxisMax,
						stepSize: 50
					}
				}]
			}
    }
	});
</script>