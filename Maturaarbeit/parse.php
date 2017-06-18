<?php
$title="Parser";
include 'header.php';
include 'db.php';
?>
	<h1>Parser</h1>
	<?php //gpx test;
	use phpGPX\phpGPX;
	$gpx = new phpGPX();
	$file = $gpx->load('activities/gpx/example.gpx');
	/*foreach ($file->tracks as $track){
		// Statistics for whole track
		$track->stats->toArray();
		print_r($track);
		echo "<br /><br />";
		foreach ($track->segments as $segment)
		{
			// Statistics for segment of track
			$segment->stats->toArray();
			print_r($segment);
		}
	}*/
	$count=0;
	echo "<table>";
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
	foreach ($file->tracks as $track){
		$segment = $track->segments;
			foreach ($segment as $segment) {
			$points = $segment->points;
			foreach ($points as $points) {
				$point=(array)$points;
				echo "<tr>";
				foreach ($point as $value) {
					$count++;
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
						echo "<td>_</td>";
					}
				}
				echo "</tr>";
			}
		}
	}
	echo "</table>";
	echo "<br /><br />";


	/*$counter = 0;
	foreach ($file->tracks as $track){
		//echo "<br /> key1: ".key($track)."<br /><br />";
		$segment = $track->segments;
			//echo "<br /> key2: ".key($segment)."<br /><br />";
			foreach ($segment as $segment) {
			$points = $segment->points;
			foreach ($points as $points) {
				//echo "<br /> key3: ".key($points)."<br /><br />";
				$point=(array)$points;
				$counter++;
				echo $counter."<br />";
				foreach ($point as $value) {
					if(!empty($value)){
						//print_r(array_keys($point));
						if(gettype($value)=='object'){
							$values=(array)$value;
							unset($value);
							$value = "";
							foreach ($values as $values) {
								$value .= strval($values)."_";
							}
						}
						echo print_r($value)."<br>";
					}
				}
				echo $counter."<br />";
				echo "<br>";
			}
		}
	}*/
	?>
</body>
</html>
