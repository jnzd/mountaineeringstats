<?php
$title="Parser";
include 'header.php';
include 'db.php';
?>
	<h1>Parser</h1>
	<?php //gpx test;
	use phpGPX\phpGPX;
	$gpx = new phpGPX();
	$file = $gpx->load('activities/gpx/example2.gpx');
	foreach ($file->tracks as $track){
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
	}

	foreach ($file->tracks as $track){
		$segment = $track->segments;
		foreach ($segment as $segment) {
			$points = $segment->points;
			foreach ($points as $points) {
				$point=(array)$points;
				print_r($point);
				echo "<br /><br />";
				foreach ($point as $value) {
					if($value != null){
						echo print_r($value)."<br>";
					}
				}
			}
		}
	}

	echo "<br /><br />";
	?>
</body>
</html>
