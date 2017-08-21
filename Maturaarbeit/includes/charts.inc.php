<?php
    
?>
<canvas class="chart" id="elevation" ></canvas>
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
	var yAxisMax = Math.round((elevationMax+difference/10)/10)*10;
	var height = yAxisMax-yAxisMin;

	console.log(yAxisMax);
	console.log(yAxisMin);
	console.log(time[0]);
	console.log(time[time.length-1]);
	console.log(elevation);
	console.log(time);

	var ctx = document.getElementById("elevation");
	var elevationChart = new Chart(ctx, {
		type: 'line',
		labels: ['a','b','c','d','e','f','g','h','i'],//time,
    data: {
			datasets: [{
				label: "elevation",
				borderColor: "#919191",
				data: [1,2,3,4,5,6,7,8,8]//elevation
			}]
		},
		options: {
			scales: {
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Meter über Meer'
					},
					ticks: {
						//beginAtZero: false,
						//stepSize: 50
					}
				}],
				xAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: 'Zeit'
					},
					ticks: {
						//min: time[0],
						//max: time[time.length-1]
					}
				}]
			}
    }
	});
</script>
