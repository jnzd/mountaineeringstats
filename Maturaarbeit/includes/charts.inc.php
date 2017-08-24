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
    data: {
			labels: time,
			datasets: [
				{
					label: "Höhe",
					borderColor: "#919191",
					data: elevation
				}
			]
		},
		options: {
			scales: {
				yAxes: [
					{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Meter über Meer'
						},
						ticks: {
							//beginAtZero: false,
							//stepSize: 50
						}
					}
				],
				xAxes: [
					{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Zeit'
						},
						ticks: {
							min: time[0],
							max: time[time.length-1]
						}
					}
				]
			}
    }
	});

	/*new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
    datasets:[
			{ 
        data: [86,114,106,106,107,111,133,221,783,2478],
        label: "Africa",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: [282,350,411,502,635,809,947,1402,3700,5267],
        label: "Asia",
        borderColor: "#8e5ea2",
        fill: false
      }, { 
        data: [168,170,178,190,203,276,408,547,675,734],
        label: "Europe",
        borderColor: "#3cba9f",
        fill: false
      }, { 
        data: [40,20,10,16,24,38,74,167,508,784],
        label: "Latin America",
        borderColor: "#e8c3b9",
        fill: false
      }, { 
        data: [6,3,2,2,7,26,82,172,312,433],
        label: "North America",
        borderColor: "#c45850",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)'
    }
  }
});*/




</script>
