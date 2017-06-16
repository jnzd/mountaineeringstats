<?php
$title="Karte";
include 'header.php';
include 'db.php';
?>

	<h1>Test</h1>

	<?php //gpx test;
	use phpGPX\phpGPX;

	$gpx = new phpGPX();

	$file = $gpx->load('activities/gpx/MorningActivity.gpx');

	foreach ($file->tracks as $track){

		// Statistics for whole track
		$track->stats->toArray();
		print_r($track);

		foreach ($track->segments as $segment)
		{
			// Statistics for segment of track
			$segment->stats->toArray();
			print_r($segment);
		}
	}
	?>

	<script>
		function loadDoc(){
			var xhttp = new XMLHttpRequest();

			xhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					document.getElementById("demo").innerHTML = this.responseText;
				}
			};

			xhttp.open("GET", "ajax_info.txt", true);
			xhttp.send();
		}
	</script>
	<br>

</body>
</html>
