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
		print_r($lat_js);
		print_r($long_js);
	?>
  <div id="map"></div>
  <script>
		var lat = <?php echo $lat_js; ?>;
		var lng = <?php echo $long_js; ?>;
		console.log(lat);
		console.log(lng);
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: {lat: 46.867733, lng: 8.8561171},
        mapTypeId: 'roadmap'
      });

			var trackCoordinates = [];
			var length = lat.length
			for(i=0; i<length; i++){
				var point = new google.maps.LatLng(lat[i],lng[i]);
				trackCoordinates.push(point);
			}
			console.log(trackCoordinates);
			/*var trackCoordinates = [
            {lat: 46.867456, lng: 8.856134},
            {lat: 46.867567, lng: 8.856543},
            {lat: 46.867564, lng: 8.856674}
      ];*/

      var track = new google.maps.Polyline({
        path: trackCoordinates,
        geodesic: true,
        strokeColor: 'red',
        strokeOpacity: 1.0,
        strokeWeight: 4
      });
      track.setMap(map);
    }
  </script>

	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap">
	</script>
	</div>
</body>
</html>
