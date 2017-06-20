<?php
$title="Karte";
include 'header.php';
include 'db.php';
?>

	<h1>Test</h1>

	<?php //gpx test;
		use phpGPX\phpGPX;
		$gpx = new phpGPX();
		$file = $gpx->load('activities/gpx/example.gpx');

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
        zoom: 10,
        center: {lat: 46.867733, lng: 8.8561171},
        mapTypeId: 'roadmap'
      });

			var runCoordinates = [];
			for(i=0; i<latitude.lenght; i++){
			runCoordinates.push({lat: latitude[i], lng: longitude[i]});
			}

			var runCoordinates = [
            {lat: latitude[i], lng: longitude[i]},
            {lat: 46.867, lng: 8.856},
            {lat: 46.867	,lng: 8.856}
        ];

      var run = new google.maps.Polyline({
        path: runCoordinates,
        geodesic: true,
        strokeColor: 'red',
        strokeOpacity: 1.0,
        strokeWeight: 4
      });
      run.setMap(map);
    }
  </script>

	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap">
	</script>
	</div>
</body>
</html>
