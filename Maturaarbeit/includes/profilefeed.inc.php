<h1>Meine Aktivitäten</h1>
<?php
  require 'vendor/emcconville/google-map-polyline-encoding-tool/src/Polyline.php';
  if(isset($_SESSION['id'])){
    include 'parsers/parse.gpx.php';
    $id = $_SESSION['id'];
    function resultToArray($result) {
      $rows = array();
      while($row = $result->fetch_assoc()) {
          $rows[] = $row;
      }
      return $rows;
    }
    $sql = "SELECT * FROM activities WHERE user_id='$id'";
    $result = $conn->query($sql);
    $rownr = $result->num_rows;
    if($rownr>0){
      $rows = resultToArray($result);
      $result->free();
      foreach($rows as $row) {
        $title = $row['title'];
        $actid = $row['id'];
        $sport = $row['sport'];
        $path = $row['actPath'];
        $type = $row['type'];
        $actTime = $row['actTime'];
        $filename = $row['filename'];
        $description = $row['description'];
        echo "<h1><a clas='actTitle' href='../activity.php?name=".$filename."'>".$title."</a></h1>";
        echo "<p>".$description."</p>";
        $values = gpx($row['actPath']);
        $latitude = $values['latitudePHP'];
        $longitude = $values['longitudePHP'];        
        $track = [];
        $i = 0;
        foreach($latitude as $lat){
          array_push($track, array($lat,$longitude[$i]));
          $i++;
        }
        $encodedCoords = Polyline::encode($track);
        $latCenter = (max($latitude)+min($latitude))/2;
        $longCenter = (max($longitude)+min($longitude))/2;
        echo "<img src='https://maps.googleapis.com/maps/api/staticmap?size=400x400&center=".$latCenter.",".$longCenter."&zoom=14&path=weight:3%7Ccolor:blue%7Cenc:".$encodedCoords."&key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s'><br>";
        include 'includes/displayComments.inc.php';        
        echo"</div>";
        include 'includes/likeButton.inc.php';
        include 'includes/commentForm.inc.php';
      }
    }else{
      echo "<p>Du hast noch keine Aktivitäten hochgeladen</p>";
      echo "<a href='upload.php'>HOCHLADEN</a>";
    }
  }
?>
