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

	echo "distance: ".$distance."<br />";
	echo "averageSpeed: ".$averageSpeed."<br />";
	echo "averagePace: ".$averagePace."<br />";
	echo "minAltitude: ".$minAltitude."<br />";
	echo "maxAltitude: ".$maxAltitude."<br />";
	echo "startedAt: ".$startedAt."<br />";
	echo "finishedAt: ".$finishedAt."<br />";
	echo "duration: ".$duration."<br />";
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
					$result .= strval($results)."-";
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

	$index=0;

	foreach ($file->tracks as $track){
		$segment = $track->segments;
			foreach ($segment as $segment) {
			$points = $segment->points;
			foreach ($points as $points) {
				$latitude = [
					$index => $point->latitude,
				];
			}
		}
	}
	print_r($latitude);
	echo "<br />";
//start full table----------------------------------------
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
							$value .= strval($values)."_";
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
</body>
</html>
