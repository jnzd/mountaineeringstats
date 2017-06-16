<?php
$title="Karte";
include 'header.php';
include 'db.php';
?>

	<h1>Test</h1>
	<div id="map">
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
	</script>

	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap">
	</script>
	</div>
</body>
</html>
