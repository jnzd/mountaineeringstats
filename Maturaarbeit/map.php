<?php
$title="Karte";
include 'header.php';
include 'db.php';
?>

	<h1>Test</h1>

	<?php //gpx test;
		use phpGPX\phpGPX;
		$gpx = new phpGPX();
		$file = $gpx->load('activities/gpx/example2.gpx');

		//define empty arrays
		$latitude = [];//imprtant
		$longitude = [];//imprtant
		$elevation = [];//important
		$time = [];//important
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
					array_push($time, $points->time);
					array_push($difference, $points->difference);
					array_push($distance, $points->distance);

					$lat_js = json_encode($latitude);
					$long_js = json_encode($longitude);
				}
			}
		}
	?>
  <div id="map"></div>
  <script>
		var latitude = <?php echo $lat_js; ?>;
		var longitude = <?php echo $long_js; ?>;

    // This example creates a 2-pixel-wide red polyline showing the path of William
    // Kingsford Smith's first trans-Pacific flight between Oakland, CA, and
    // Brisbane, Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: {lat: 46.86, lng: 8.8},
        mapTypeId: 'terrain'
      });

			var runCoordinates = [];
			document.write(latitude.length);
			for(i=0; i<latitude.lenght; i++){
				document.write(i);
				runCoordinates.push({lat: latitude[i], lng: longitude[i]});
			}
			document.write(runCoordinates);

      var run = new google.maps.Polyline({
        path: runCoordinates,
        geodesic: true,
        strokeColor: 'red',
        strokeOpacity: 1.0,
        strokeWeight: 4
      });
      flightPath.setMap(map);
    }
  </script>

	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap">
	</script>
	</div>
</body>
</html>
