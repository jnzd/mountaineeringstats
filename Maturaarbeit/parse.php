<?php
$title="Parser";
include 'header.php';
include 'db.php';
?>
	<h1>Parser</h1>
	<?php
	use phpGPX\phpGPX;
	$gpx = new phpGPX();
	$file = $gpx->load('activities/gpx/example2.gpx');
//file loaded-------------------------------------------------

//stats as variables--------------
foreach ($file->tracks as $track){
	$stat = $track->stats;
	$distance = $stat->distance;
	$averageSpeed = $stat->averageSpeed;
	$averagePace = $stat->averagePace;
	$minAltitude = $stat->minAltitude;
	$maxAltitude = $stat->maxAltitude;
	$startedAt = "";
	foreach ($stat->startedAt as $start){
		$startedAt .= strval($start)."-";
	}
	$finishedAt = "";
	foreach ($stat->finishedAt as $finish){
		$finishedAt .= strval($finish)."-";
	}
	$duration =	$stat->duration;

	/*echo "distance: ".$distance."<br />";
	echo "averageSpeed: ".$averageSpeed."<br />";
	echo "averagePace: ".$averagePace."<br />";
	echo "minAltitude: ".$minAltitude."<br />";
	echo "maxAltitude: ".$maxAltitude."<br />";
	echo "startedAt: ".$startedAt."<br />";
	echo "finishedAt: ".$finishedAt."<br />";
	echo "duration: ".$duration."<br />";*/
}
//stats as variables finished---------------------------------
//------------------------------------------------------------
	echo "<table>";
	echo "<tr>
		<th>distance</th>
		<th>averageSpeed</th>
		<th>averagePace</th>
		<th>minAltitude</th>
		<th>maxAltitude</th>
		<th>startedAt</th>
		<th>finishedAt</th>
		<th>duration</th>
	</tr>";
	foreach ($file->tracks as $track){
		$stats = $track->stats;
		$stat=(array)$stats;
		echo "<tr>";
		foreach ($stat as $result){
			if(gettype($result)=='object'){
				$results=(array)$result;
				unset($result);
				$result = "";
				foreach ($results as $results){
					$result .= strval($results)." ";
				}
			}else{
				$data = $result;
			}
			echo "<td>".print_r($result, true)."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
//end stats-table-----------------------------------------
	echo "<br /><br /><br />";

	//define empty arrays
	$latitude = [];//imprtant
	$longitude = [];//imprtant
	$elevation = [];//important
	$time = [];//important
	$magVar = [];
	$geoidHeight = [];
	$name = [];
	$comment = [];
	$description = [];
	$source = [];
	$links = [];
	$symbol = [];
	$type = [];
	$fix = [];
	$satellitesNumber = [];
	$hdop = [];
	$vdop = [];
	$pdop = [];
	$ageOfGpsData = [];
	$dgpsid = [];
	$difference = [];//maybe important
	$distance = [];//important
	$extensions = [];
	$pointType = [];

	foreach ($file->tracks as $track){
		$segment = $track->segments;
			foreach ($segment as $segment) {
			$points = $segment->points;
			//fill data arrays
			foreach ($points as $points) {
				array_push($latitude, $points->latitude);
				array_push($longitude, $points->longitude);
				array_push($elevation, $points->elevation);
				array_push($time, $points->time);
				array_push($magVar, $points->magVar);
				array_push($geoidHeight, $points->geoidHeight);
				array_push($name, $points->name);
				array_push($comment, $points->comment);
				array_push($source, $points->source);
				array_push($links, $points->links);
				array_push($symbol, $points->symbol);
				array_push($type, $points->type);
				array_push($fix, $points->fix);
				array_push($satellitesNumber, $points->satellitesNumber);
				array_push($hdop, $points->hdop);
				array_push($vdop, $points->vdop);
				array_push($pdop, $points->pdop);
				array_push($ageOfGpsData, $points->ageOfGpsData);
				array_push($dgpsid, $points->dgpsid);
				array_push($difference, $points->difference);
				array_push($distance, $points->distance);
				array_push($extensions, $points->extensions);
				//array_push($pointType, $points->pointType);//fatal error...
			}
		}
	}
	/*print_r($latitude);
	echo "<br />";
	print_r($longitude);
	echo "<br />";
	print_r($elevation);
	echo "<br />";
	print_r($time);
	echo "<br />";
	print_r($distance);
	echo "<br />";*/
//-------------------------------------------------------
	echo "<table>";
//setup table header--------------------------------------
	echo "<tr>
		<th>latitude</th>
		<th>longitude</th>
		<th>elevation</th>
		<th>time</th>
		<th>magVar</th>
		<th>geoidHeight</th>
		<th>name</th>
		<th>comment</th>
		<th>description</th>
		<th>source</th>
		<th>links</th>
		<th>symbol</th>
		<th>type</th>
		<th>fix</th>
		<th>satellitesNumber</th>
		<th>hdop</th>
		<th>vdop</th>
		<th>pdop</th>
		<th>ageOfGpsData</th>
		<th>dgpsid</th>
		<th>difference</th>
		<th>distance</th>
		<th>extensions</th>
		<th>pointType</th>
	</tr>";
//table header complete
	foreach ($file->tracks as $track){
		$segment = $track->segments;
			foreach ($segment as $segment) {
			$points = $segment->points;
			foreach ($points as $points) {
				$point=(array)$points;
				echo "<tr>";
				foreach ($point as $value) {
					if(gettype($value)=='object'){
						$values=(array)$value;
						unset($value);
						$value = "";
						foreach ($values as $values) {
							$value .= strval($values)." ";
						}
					}
					if(!empty($value)){
						$data = print_r($value, true);
						echo "<td>".$data."</td>";
					}else{
						echo "<td>-</td>";
					}
				}
				echo "</tr>";
			}
		}
	}
	echo "</table>";
	echo "<br /><br />";
//Table complete--------------------------------------------
	?>
<!-- ************************************************************************************-->

		<canvas id="draw" width="550px" height="550px"></canvas>
    <script src="../node_modules/chartjs/chart.js"></script>
    <script type="text/javascript">
    var data = {
      labels: [],
      data: [],
      fillColor: [],
      strokeColor: []
    }
    for (var ind = 0; ind < 10; ++ind) {
      data.labels.push('Label');
      if (ind  % 3 == 0) data.data.push(Math.random() * 10000); else
      data.data.push([Math.random() * 10000,Math.random() * 10000]);
      var r = Math.floor(Math.random() * 256)
      var g = Math.floor(Math.random() * 256)
      var b = Math.floor(Math.random() * 256)
      r+= ','
      g+=','
      data.fillColor.push('rgb(' + r + g + b + ')');
      data.strokeColor.push('rgb(' + r + g + b + ')');
    }

    var canvas;
    var c = new BarChart((canvas = document.getElementById('draw')).getContext('2d'),{
      fillColorBackground: 'rgb(255, 255, 255)',
      fillColorBars: 'rgba(180, 180, 180, 0.30)',
      //fontWeight: 'lighter',
      fontSizeTitle: 18,
      fontSizeLabels: 16,
      fontSizeAxes: 18,
      paddingPercentBars: 0.3,
      maxWidthBars: 100,
      paddingPercentTicks: 1.0,
      //barStyle: 'error',
      barStyle: 'line',
      //scaleStyle: 'log2',
      radiusDot: 0,
      fillRegion: 'background',
      // tickFormatter: (tick) => {
      //   if (tick >= 1000) {
      //     return (tick / 1000) + 'k';
      //   }
      //   return tick;
      // },
      // tickFormatterMeasure: '##k'
    });
    /*c.update({
      //title: 'Graph 1: Processor Results',
      xAxis: 'Machines',
      yAxis: 'Seconds',
      labels: [ '1', '2', '4', '8', '16', '32', '64', '128', '256', '512', '1024' ],
    data:
     [ [ 102.56, 101.992, 101.68, 102.374, 102.416 ],
       [ 53.267, 53.278, 53.865, 53.593, 53.251 ],
       [ 28.564, 29.282, 28.361, 28.347, 28.726 ],
       [ 16.982, 21.037, 17.063, 16.841, 17.075 ],
       [ 11.201, 11.122, 11.289, 10.767, 10.577, 10.547 ],
       [ 8.527, 7.918, 8.006, 7.514, 7.344 ],
       [ 7.017, 6.256, 5.887, 6.082, 6.051 ],
       [ 7.175, 6.641, 6.155, 7.154, 6.571 ],
       [ 6.737, 9.314, 8.515, 6.83, 8.124 ],
       [ 7.044, 7.432, 7.362, 6.913, 7.453 ],
       [ 8.154, 7.82, 8.565, 10.645, 9.04 ] ],
    meta:
     [ { average: 102.204, sd: 0.361, tests: 5, se: 0.161 },
       { average: 53.451, sd: 0.272, tests: 5, se: 0.122 },
       { average: 28.656, sd: 0.383, tests: 5, se: 0.171 },
       { average: 17.8, sd: 1.812, tests: 5, se: 0.81 },
       { average: 10.917, sd: 0.327, tests: 6, se: 0.134 },
       { average: 7.862, sd: 0.462, tests: 5, se: 0.207 },
       { average: 6.259, sd: 0.444, tests: 5, se: 0.198 },
       { average: 6.739, sd: 0.43, tests: 5, se: 0.193 },
       { average: 7.904, sd: 1.11, tests: 5, se: 0.496 },
       { average: 7.241, sd: 0.246, tests: 5, se: 0.11 },
       { average: 8.845, sd: 1.105, tests: 5, se: 0.494 } ] })*/
    /*c.update({
      labels: ['testtesttest', 'testtestesttetest', 'stesttesttest', 'testtesttesttest', 'testtesttesttest'],
      xAxis:'WWWWWWWWW',
      data: [0.04, 0.05, 0.05, 0.04, 0.04],
      //balls: [{ radius: 5, fill: 'rgb(0,255,0)', stroke: 'rgb(255,0,0)', value: 0 },{ radius: 5, fill: 'rgb(0,255,0)', stroke: 'rgb(255,0,0)', value: 0 },{ radius: 5, fill: 'rgb(0,255,0)', stroke: 'rgb(255,0,0)', value: 0 },{ radius: 5, fill: 'rgb(0,255,0)', stroke: 'rgb(255,0,0)', value: 0 },{ radius: 5, fill: 'rgb(0,255,0)', stroke: 'rgb(255,0,0)', value: 0 }],
    })*/
    //c.update(data);
    //show current value on top of bar
    c.update({
      labels: [['label 1a', 'label 1b'], ['label 2a','label 2b'], 'a', 'c','b'],
      data: [[20, 30, 10, 10], [25, 25, 15, 25], 15,15, [10,12,15]],
      hints: [['bla\nblalas','bla1','bla3','bla4'],['1bla','bala1','bala3','bala4']],
      dataTags: [['long tag tesasster more', 'b', 'c', 'd'], ['a', 'b', 'c', 'd']],
      hints: ['Testing', 'Testing2', 'Testing3'],
      topLabels: ['label 3', 'label 4'],
      fillColor: [['rgba(100, 200, 200, 0.5)', 'rgba(50, 30, 20, 0.5)', 'rgba(100, 50, 200, 0.5)', 'rgba(100, 200, 0, 0.5)'],['rgba(100, 200, 200, 0.5)', 'rgba(50, 30, 20, 0.5)', 'rgba(100, 50, 200, 0.5)', 'rgba(100, 200, 0, 0.5)']],
      legend: [
        { color: 'rgba(100, 200, 200, 1)', label: 'abc' },
        { color: 'rgba(50, 30, 20, 1)', label: 'asfasa' },
        { color: 'rgba(100, 50, 200, 1)', label: 'asfasaf' },
        { color: 'rgba(100, 200, 0, 1)', label: '124j1i2j' },
        { color: 'rgba(100, 200, 200, 1)', label: 'abc' },
        { color: 'rgba(50, 30, 20, 1)', label: 'asfasa' },
        { color: 'rgba(100, 50, 200, 1)', label: 'asfasaf' },
        { color: 'rgba(100, 200, 0, 1)', label: '124j1i2j' },
        { color: 'rgba(100, 200, 200, 1)', label: 'abc' },
        { color: 'rgba(50, 30, 20, 1)', label: 'asfasa' },
        { color: 'rgba(100, 50, 200, 1)', label: 'asfasaf' },
        { color: 'rgba(100, 200, 0, 1)', label: '124j1i2j' },
        { color: 'rgba(100, 200, 200, 1)', label: 'abc' },
        { color: 'rgba(50, 30, 20, 1)', label: 'asfasa' },
        { color: 'rgba(100, 50, 200, 1)', label: 'asfasaf' },
        { color: 'rgba(100, 200, 0, 1)', label: '124j1i2j' }
      ],
      bars: [{ style: 'rgb(255, 0, 0)', value: 50 },{ style: 'rgb(255, 0, 0)', value: 10 }],
      balls: [{ radius: 5, fill: 'rgb(0,255,0)', stroke: 'rgb(255,0,0)', value: 0 },{ radius: 5, fill: 'rgb(0,255,0)', stroke: 'rgb(255,0,0)', value: 0 },{ radius: 5, fill: 'rgb(0,255,0)', stroke: 'rgb(255,0,0)', value: 0 },{ radius: 5, fill: 'rgb(0,255,0)', stroke: 'rgb(255,0,0)', value: 0 },{ radius: 5, fill: 'rgb(0,255,0)', stroke: 'rgb(255,0,0)', value: 0 }],
      title:'Bla bla'
    });
    canvas.addEventListener('mousemove', function(e) {
      var rect = canvas.getBoundingClientRect();
      c.mousemove(e.clientX - rect.left, e.clientY - rect.top);
      //console.log(c.labelPositions)
      console.log(c.fillRegions)
    });
    </script>
</body>
</html>
