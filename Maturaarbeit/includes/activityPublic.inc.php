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
  $values = gpx($row['actPath']);
  
  $lat_js = $values['latitude'];
  $long_js = $values['longitude'];
  $elevation_js = $values['elevation'];
  $distance_js = $values['distance'];
  $time_js = $values['time'];

  include 'includes/charts.inc.php';
  include 'includes/map.inc.php';
  include 'includes/displayComments.inc.php';
  include 'includes/likeButton.inc.php';
  include 'includes/commentForm.inc.php';
?>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap">
</script>
