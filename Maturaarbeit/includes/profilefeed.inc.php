<h1>Meine Aktivitäten</h1>
<?php
  require 'vendor/emcconville/google-map-polyline-encoding-tool/src/Polyline.php';
  if(isset($_SESSION['id'])){
    include 'parsers/parse.gpx.php';
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM activities WHERE user_id='$id'";
    $result = $conn->query($sql);
    $rownr = $result->num_rows;
    if($rownr>0){
      $rows = resultToArray($result);
      $result->free();
      foreach($rows as $row) {
        $activityLink = "../activity.php?name=".$filename;
        include 'activityPreview.inc.php';
      }
    }else{
      echo "<p>Du hast noch keine Aktivitäten hochgeladen</p>";
      echo "<a href='upload.php'>HOCHLADEN</a>";
    }
  }
?>
