<?php
include 'db.php';
include 'parsers/parse.gpx.php';
$name = $_GET['name'];
$sql = "SELECT * FROM activities WHERE filename='$name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$title = $row['title'];
$actid = $row['id'];
$sport = $row['sport'];
$path = $row['actPath'];
$type = $row['type'];
$actTime = $row['actTime'];
$description = $row['description'];
echo "<h1>".$title."</h1><br />";
echo "<p>".$description."</p><br />";
gpx($row['actPath']);
?>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap">
</script>
<?php
echo "<a href='includes/deleteAct.inc.php'>Aktivität löschen</a>";
echo "<br />";
?>
