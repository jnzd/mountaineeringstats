<?php
  require 'vendor/emcconville/google-map-polyline-encoding-tool/src/Polyline.php';
  $sql = "SELECT * FROM users WHERE username='$publicUser'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $id = $row['id'];
  if($id == $_SESSION['id']){
    header("Location: profile.php");
  }
  include 'includes/profileheaderPublic.inc.php';
?>
<div class="feed">
  <?php
    include 'parsers/parse.gpx.php';
    $sql = "SELECT * FROM activities WHERE user_id='$id'";
    $result = $conn->query($sql);
    $rownr = $result->num_rows;
    if($rownr>0){
      $rows = resultToArray($result);
      $result->free();
      foreach($rows as $row) {
        echo "<div class='activityPreview'>";
        $title = $row['title'];
        $actid = $row['id'];
        $sport = $row['sport'];
        $path = $row['actPath'];
        $type = $row['type'];
        $actTime = $row['actTime'];
        $filename = $row['filename'];
        $description = $row['description'];
        echo "<h1><a class='actTitle' href='../activityPublic.php?name=".$filename."&username=".$publicUser."'>".$title."</a></h1>";
        include 'includes/icons.inc.php';
        echo "<p>".$description."</p>";
        $values = gpx($row['actPath']);
        include 'includes/staticMap.inc.php';
        include 'includes/displayComments.inc.php';
        include 'includes/likeButton.inc.php';
        include 'includes/commentForm.inc.php';
        echo "</div>";
      }
    }else{
      echo "<br /><h2>Dieser User hat noch keine Aktivitäten hochgeladen</h2>";
    }
  ?>
  </div>
