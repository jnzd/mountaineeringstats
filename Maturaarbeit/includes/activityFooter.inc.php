</div>
<?php
  $values = gpx($row['actPath']);
  $lat_js = $values['latitude'];
  $long_js = $values['longitude'];
  $elevation_js = $values['elevation'];
  $distance_js = $values['distance'];
  $time_js = $values['time'];
  $speed_js = $values['speed'];
  $longitude = $values['longitudePHP'];
  $latitude = $values['latitudePHP'];
  $dateTime = $values['dateTime'];
  $distance = $values['distancePHP'];
  include 'includes/charts.inc.php';
  include 'includes/map.inc.php';
  include 'includes/displayComments.inc.php';
  include 'includes/likeButton.inc.php';
  include 'includes/commentForm.inc.php';
?>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap">
</script>