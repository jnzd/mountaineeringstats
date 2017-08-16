<?php
$title="Feed";
include 'header.php';
include 'db.php';
?>

<?php
	include 'vendor/autoload.php';
	use phpGPX\phpGPX;
	$gpx = new phpGPX();
  //$file = $gpx->load('activities/gpx/Afternoon_Run.gpx');
  $file = $gpx->load('activities/gpx/jonasdegelo2017-07-23-17-16-47.gpx');
  
	//define empty arrays
	$latitude = [];//imprtant
	$longitude = [];//imprtant
	$elevation = [];//important
	$dateTime = [];//important
	$time = [];
	$difference = [];//maybe important
	$distance = [];//important

	foreach ($file->tracks as $track){
		$segment = $track->segments;
			foreach ($segment as $segment) {
			$points = $segment->points;
			//fill data arrays
			foreach ($points as $points) {
				array_push($latitude, $points->latitude);
				array_push($longitude, $points->longitude);
				array_push($elevation, $points->elevation);
        array_push($dateTime, $points->time);
        //echo $points->time->date;
				//array_push($time, $times->date);
				array_push($difference, $points->difference);
      }
      //print_r($dateTime);
      //var_dump($time);
      //array_push($distance, $points->distance);
      //var_dump($distance);      
      $lat_js = json_encode($latitude);
      $long_js = json_encode($longitude);
      $elvation_js = json_encode($elevation);
      $distance_js = json_encode($distance);
		}
  }
  foreach($dateTime as $moment){
    $date = $moment->format('Y-m-d H:i:s');
    //$date = $moment->date;
    array_push($time, $date);
    //echo $date;
  }
  print_r($time);
?>

<!---	<canvas class="chart" id="myChart" width="400" height="400"></canvas>
	<script src="node_modules/chart.js/dist/Chart.js"></script>
	<script>
    var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var config = {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
          label: "My First dataset",
          backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.red,
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ],
          fill: false,
        }, {
          label: "My Second dataset",
          fill: false,
          backgroundColor: window.chartColors.blue,
          borderColor: window.chartColors.blue,
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor()
          ],
        }]
      },
      options: {
        responsive: true,
        title:{
          display:true,
          text:'Chart.js Line Chart'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Month'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Value'
            }
          }]
        }
      }
    };
    window.onload = function() {
      var ctx = document.getElementById("canvas").getContext("2d");
      window.myLine = new Chart(ctx, config);
    };
    document.getElementById('randomizeData').addEventListener('click', function() {
      config.data.datasets.forEach(function(dataset) {
        dataset.data = dataset.data.map(function() {
          return randomScalingFactor();
        });
      });
        window.myLine.update();
    });
    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function() {
      var colorName = colorNames[config.data.datasets.length % colorNames.length];
      var newColor = window.chartColors[colorName];
      var newDataset = {
        label: 'Dataset ' + config.data.datasets.length,
        backgroundColor: newColor,
        borderColor: newColor,
        data: [],
        fill: false
      };
      for (var index = 0; index < config.data.labels.length; ++index) {
        newDataset.data.push(randomScalingFactor());
      }
      config.data.datasets.push(newDataset);
      window.myLine.update();
    });
    document.getElementById('addData').addEventListener('click', function() {
      if (config.data.datasets.length > 0) {
        var month = MONTHS[config.data.labels.length % MONTHS.length];
        config.data.labels.push(month);
        config.data.datasets.forEach(function(dataset) {
          dataset.data.push(randomScalingFactor());
        });
        window.myLine.update();
      }
    });
    document.getElementById('removeDataset').addEventListener('click', function() {
      config.data.datasets.splice(0, 1);
      window.myLine.update();
    });
    document.getElementById('removeData').addEventListener('click', function() {
      config.data.labels.splice(-1, 1); // remove the label first
      config.data.datasets.forEach(function(dataset, datasetIndex) {
        dataset.data.pop();
      });
      window.myLine.update();
    });
  </script>-->
</body>
</html>
