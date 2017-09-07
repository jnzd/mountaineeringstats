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
        include 'includes/staticMap.inc.php';
        include 'includes/displayComments.inc.php';
        include 'includes/likeButton.inc.php';
        include 'includes/commentForm.inc.php';
      }
    }else{
      echo "<p>Du hast noch keine Aktivitäten hochgeladen</p>";
      echo "<a href='upload.php'>HOCHLADEN</a>";
    }
  }
?>
