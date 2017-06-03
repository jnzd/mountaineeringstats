<?php
$title="Willkommen";
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