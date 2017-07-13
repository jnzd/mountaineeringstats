<?php
	$title="Karte";
	include 'header.php';
	include 'db.php';
?>
	<h1>Test</h1>
	<?php gpx('activities/gpx/afternoon_run.gpx'); ?>
  <div id="map">
  <script>
//set javascript arrays
		var lat = <?php
								echo $lat_js;
							?>;
		var lng = <?php
								echo $long_js;
							?>;

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
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap">
	</script>
	</div>
</div>
</body>
</html>
