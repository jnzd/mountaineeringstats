<?php
	$title="Entdecken";
	include 'header.php';
	$id = $_SESSION['id'];
	include 'parsers/parse.gpx.php';
	include 'db.php';
	$sql = "SELECT * FROM activities";
	$result = $conn->query($sql);
	$rows = resultToArray($result);
	$latitude = [];
	$longitude = [];
	$randID = [];
	$title = [];
	foreach($rows as $row){
		$path = $row['actPath'];
		$values = gpx($path);
		array_push($latitude, $values['latitudePHP'][0]);
		array_push($longitude, $values['longitudePHP'][0]);
		array_push($randID, $row['randomID']);
		array_push($title, $row['title']);
	}
?>
<div class='upload'>
	<h1>Entdecken</h1>
	<p>Hier kannst du andere Aktivitäten aus aller Welt entdecken</p>
</div>
<div  class="discover">
  <div id="discover"></div>
</div>
<script>
	var latitude = <?php echo json_encode($latitude);?>;
	var longitude = <?php echo json_encode($longitude);?>;
	var randID = <?php echo json_encode($randID);?>;
	var title = <?php echo json_encode($title);?>;
</script>
<script src="javascript/discover.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap"></script>
<?php
  include 'footer.php';
?>
