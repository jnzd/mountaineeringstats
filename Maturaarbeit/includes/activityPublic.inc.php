<?php
  include 'db.php';
  include 'parsers/parse.gpx.php';
  $name = $_GET['name'];
  // values from database
  $sql = "SELECT * FROM activities WHERE filename='$name'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $title = $row['title'];
  $actid = $row['id'];
  $sport = $row['sport'];
  $path = $row['actPath'];
  $type = $row['type'];
  $actTime = $row['actTime'];
  $description = $row['description'];
  //values directly from gpx file
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
?>
<div class="activity">
  <div class='actHeader'>
    <div class='date'>
      <p><?php echo $dateTime[0]->format('Y-m-d H:i:s');; ?>
    </div>
    <div class='title'>
      <h1><?php echo $title; ?></h1><br>
    </div>
    <?php
        include 'includes/icons.inc.php';
    ?>
    <div class="actDescription">
      <p><?php echo $description; ?></p>
    </div>
    <?php
      if(isset($edit)){
        echo $edit;
      }
    ?>
  </div>
  <div class="actDetails">
    <p>Distanz: <?php echo $distance; ?><p>
    <p>Geschwindigkeit: <?php echo $speed; ?><p>
    <p>Dauer: <?php echo $duration; ?><p>
  </div>
  <?php
    include 'includes/charts.inc.php';
    include 'includes/map.inc.php';
    include 'includes/displayComments.inc.php';
    include 'includes/likeButton.inc.php';
    include 'includes/commentForm.inc.php';
  ?>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap"></script>
</div>