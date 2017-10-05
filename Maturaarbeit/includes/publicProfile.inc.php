<div class="feed">
  <?php
    /**
    * polyline encoder needed for static map path
    */
    require 'vendor/emcconville/google-map-polyline-encoding-tool/src/Polyline.php';
    $sql = "SELECT * FROM users WHERE username='$publicUser'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    if($id == $_SESSION['id']){
      header("Location: profile.php");
    }
    include 'includes/profileheaderPublic.inc.php';
    include 'parsers/parse.gpx.php';
    $sql = "SELECT * FROM activities WHERE user_id='$id' ORDER BY actTime DESC";
    $result = $conn->query($sql);
    $rownr = $result->num_rows;
    if($rownr>0){
      $rows = resultToArray($result);
      $result->free();
      foreach($rows as $row) {
        $randomid = $row['randomID'];
        $activityLink = "../activity.php?id=".$randomid;
        include 'activityPreview.inc.php';
      }
    }else{
      echo "<br /><h2>Dieser User hat noch keine Aktivitäten hochgeladen</h2>";
    }
  ?>
</div>