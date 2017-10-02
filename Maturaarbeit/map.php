<?php
	$title="Karte";
	include 'header.php';
	include 'db.php';
?>
	<?php
	use phpGPX\phpGPX;
	$gpx = new phpGPX();
	$file = $gpx->load('activities/gpx/afternoon_run.gpx');

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

//php arrays to javascript arrays
				$lat_js = json_encode($latitude);
				$long_js = json_encode($longitude);
			}
		}
	}
	?>
  <div id="map">
		<?php	//echo $lat_js; ?>
		<?php //echo $long_js; ?>
  <script>
//set javascript arrays
		var lat = <?php echo $lat_js; ?>;
		var lng = <?php echo $long_js; ?>;

		Array.prototype.max = function() {
			return Math.max.apply(null, this);
		};
		Array.prototype.min = function() {
			return Math.min.apply(null, this);
		};

		var latMax = lat.max();
		var latMin = lat.min();
		var lngMax = lng.max();
		var lngMin = lng.min();

		var centerLat = (latMax + latMin)/2;
		var centerLng = (lngMax + lngMin)/2;

		console.log(latMax);
		console.log(latMin);
		console.log(lngMax);
		console.log(lngMin);
		console.log(centerLat);
		console.log(centerLng);

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: {lat: centerLat, lng: centerLng},
        mapTypeId: 'roadmap'
      });
//create array of latlng objects from arrays
			var trackCoordinates = [];
			var length = lat.length;
			for(i=0; i<length; i++){
				var point = new google.maps.LatLng(lat[i],lng[i]);
				trackCoordinates.push(point);
			}
			console.log(trackCoordinates);

      var track = new google.maps.Polyline({
        path: trackCoordinates,
        geodesic: true,
        strokeColor: '#66a0ff',
        strokeOpacity: 1.0,
        strokeWeight: 4
      });
      track.setMap(map);
    }
  </script>
	</div>
</div>
<?php
  include 'footer.php';
?>
