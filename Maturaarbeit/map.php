<?php
$title="Karte";
include 'header.php';
include 'db.php';
?>

	<h1>Karte</h1>
	<div id="map"></div>
	<script>
	function initMap() {
		var uluru = {lat: 46.8682, lng: 8.2458};
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 4,
			center: uluru
		});
		var marker = new google.maps.Marker({
			position: uluru,
			map: map
        });
      }
	</script>
		
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap">
	</script>
	
	<?php //gpx test;
	/*use phpGPX\phpGPX;
	
	$gpx = new phpGPX();
		
	$file = $gpx->load('activities/gpx/example.gpx');
		
	foreach ($file->tracks as $track){
		
		// Statistics for whole track
		$track->stats->toArray();
		//print_r($track);
		    
		foreach ($track->segments as $segment)
		{
			// Statistics for segment of track
			$segment->stats->toArray();
			//print_r($segment);
		}
	}*/
	?>
	
	<?php
	$GPXParser = new GPXParser();
	
	$xml = "activities/gpx/example.gpx";
	
	$gpx = $GPXParser->parseXML($xml);
	
	foreach ($gpx->getTracks() as $track) {
		foreach ($track->getTrackSegments() as $trackSegment) {
			foreach ($trackSegment->getTrackPoints() as $waypoint) {
				echo 'Lat: ' . $waypoint->getLatitude() . ', Lon:' . $waypoint->getLongitude();
			}
		}
	}
	?>
	
	<!-- Date test -->
	<?php echo "<p>".date("Y-m-d H:i:s")."</p>";?>
	
	
	<!-- Ajax test -->
	
	<h1>XMLHttpRequest</h1>

	<p id="demo">change</p>
	
	<button type="button" onclick="loadDoc()">Change Content</button>
	
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
</body>
</html>