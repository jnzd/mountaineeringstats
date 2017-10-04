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
  $distanceTotal = $values['distanceTotal'];
  $duration = $values['duration'];
  $averageSpeed = $values['averageSpeed'];
?>
<div class="activity">
  <div class='date'>
    <p><?php echo $dateTime[0]->format('d.m.Y H:i:s'); ?></p>
  </div>
  <div class='actHeader'>
    <div class='titleLine'>
      <div class='title'>
        <h1><?php echo $title; ?></h1><br>
      </div>
      <?php
          include 'includes/icons.inc.php';
      ?>
      <?php
        if(isset($edit)){
          echo "<div class='actEdit'>";
          echo "<a class='editAct' href='editAct.php?name=$name'></a>";
          echo "</div>";
        }
      ?>
    </div>
    <?php
      if($description!=""){
        echo '<div class="actDescription"><p>'.$description.'</p></div>';
      }else{
        echo "<a class='addDescription' href='editAct.php'>Beschreibung hinzufügen</a>";
      }
    ?>
  </div>
  <div class="actDetails">
    <div class="infoPair">
      <p class="infoName">Distanz </p>
      <p class="infoData"><?php echo $distanceTotal; ?><p>
    </div>
    <div class="infoPair">
      <p class="infoName">Geschwindigkeit </p>
      <p class="infoData"><?php echo $averageSpeed; ?><p>
    </div>
    <div class="infoPair">
      <p class="infoName">Dauer </p>
      <p class="infoData"><?php echo $duration; ?><p>
    </div>
  </div>
  <?php
    include 'includes/charts.inc.php';
    include 'includes/map.inc.php';
		include 'includes/likeCounter.inc.php';
    include 'includes/displayComments.inc.php';
    include 'includes/likeButton.inc.php';
    include 'includes/commentForm.inc.php';
  ?>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s&callback=initMap"></script>
</div>