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
		foreach ($track->segments as $segment)
		{
			// Statistics for segment of track
			$segment->stats->toArray();
			print_r($segment);
		}
	}*/
	foreach ($file->tracks as $track){
		$stat = $track->stats->toArray();
		foreach ($stat as $stat) {
			print_r($stat);
			echo "<br />";
		}
	}

	echo "<br /><br />";

	foreach ($file->tracks as $track){
		$segment = $track->segments;
		foreach ($segment as $segment) {
			$points = $segment->points;
			foreach ($points as $points) {
				$point=(array)$points;
				foreach ($point as $value) {
					if($value != null){
						print_r($value);
						echo "<br />";
					}
				}
			}
		}
	}

	echo "<br /><br />";
	?>
</body>
</html>
