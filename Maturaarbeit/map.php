<?php
$title="Karte";
include 'header.php';
include 'db.php';
?>

	<h1>Test</h1>
	<div id="map">
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
	</div>

	<!-- Date test -->
	<?php echo "<p>".date("Y-m-d H:i:s")."</p>";?>

</body>
</html>
