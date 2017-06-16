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
	?>
  <div id="map"></div>
  <script>
    // This example creates a 2-pixel-wide red polyline showing the path of William
    // Kingsford Smith's first trans-Pacific flight between Oakland, CA, and
    // Brisbane, Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 3,
        center: {lat: 0, lng: -180},
        mapTypeId: 'terrain'
      });
      var flightPlanCoordinates = [
        {lat: 37.772, lng: -122.214},
        {lat: 21.291, lng: -157.821},
        {lat: -18.142, lng: 178.431},
        {lat: -27.467, lng: 153.027}
      ];
      var flightPath = new google.maps.Polyline({
        path: flightPlanCoordinates,
        geodesic: true,
        strokeColor: 'lightblue',
        strokeOpacity: 1.0,
        strokeWeight: 2
      });
      flightPath.setMap(map);
    }
  </script>

	<!--<div id="map">
	<script>
	function initMap(){
		var home = {lat: 46.8682, lng: 8.2458};
		var map = new google.maps.Map(document.getElementById('map'),{
			zoom: 10,
			center: home
		});
		var marker = new google.maps.Marker({
				position: home,
				map: map
      });
    }
	</script>-->

	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap">
	</script>
	</div>
</body>
</html>
