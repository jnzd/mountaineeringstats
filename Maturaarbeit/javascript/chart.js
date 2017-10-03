Array.prototype.max = function() {
return Math.max.apply(null, this);
};
Array.prototype.min = function() {
return Math.min.apply(null, this);
};
var elevationMax = elevation.max();
var elevationMin = elevation.min();
var difference = elevationMax-elevationMin;
var yAxisMin = Math.round((elevationMin-difference/10)/10)*10;
var yAxisMax = Math.round((elevationMax+difference/10)/10)*10;
var height = yAxisMax-yAxisMin;
var ctx1 = document.getElementById("elevation");
var elevationChart = new Chart(ctx1, {
type: 'line',
data: {
	labels: time,
	datasets: [
		{
			radius: 0,
			yAxisID: 'A',
			label: "Höhe",
			borderColor: "#333333",
			data: elevation
		},
		{
			radius: 0,
			yAxisID: 'B',
			label: "Geschwindigkeit",
			borderColor: "#adadad",
			data: speed
		}
	]
},
options: {
	scales: {
		yAxes: [{
			id: 'A',
			display: true,
			scaleLabel: {
				display: true,
				labelString: 'Meter über Meer'
			}
		}, {
			id: 'B',
			position: 'right',
			display: true,
			scaleLabel: {
				display: true,
				labelString: 'km/h'
			},
			gridLines:{
				display:false
			},
			ticks: {
				beginAtZero: true
			}
		}],
		xAxes: [
			{
				display: false,
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