<?php
	$title="Entdecken";
	include 'header.php';
	$id = $_SESSION['id'];
?>
<div class='upload'>
	<h1>Entdecken</h1>
	<p>Hier kannst du andere Aktivitäten aus aller Welt entdecken</p>
</div>
<?php
	include 'db.php';
	$sql = "SELECT * FROM activities";
	$result = $conn->query($result);
	$rows = resultToArray($result);
	$markers = [];
	foreach($rows as $row){
		$latlng = $row['coordinates'];
		array_push($markers, $latlng);
	}
?>
<div  class="discover">
  <div id="discover"></div>
</div>
<script>
	var markers = "<?php echo json_encode($markers);?>";
</script>
<script src="javascript/discover.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap"></script>
<?php
  include 'footer.php';
?>
