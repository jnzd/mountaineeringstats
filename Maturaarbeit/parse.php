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
	foreach ($file->tracks as $track){
		// Statistics for whole track
		$track->stats->toArray();
		print_r($track);
		/*foreach ($track->segments as $segment)
		{
			// Statistics for segment of track
			$segment->stats->toArray();
			print_r($segment);
		}*/
	}

	foreach ($variable as $key => $value) {
		# code...
	}

	foreach ($file->tracks as $track => $value) {
		echo ;
	}

	?>
</body>
</html>
