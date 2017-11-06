<?php
  /**
  * polyline encoder needed for static map path
  */
  require 'vendor/emcconville/google-map-polyline-encoding-tool/src/Polyline.php';
  if(isset($_SESSION['id'])){
    include 'parsers/parse.gpx.php';
    $id = $_SESSION['id'];
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
      echo "<div class='activityPreview'>";
      echo "<div class='feedInfo'><p>Du hast noch keine Aktivitäten hochgeladen</p><br><p>Lade deine erste Aktivität hoch: <a href='upload.php'>Hochladen</a></p></div>";
      echo "</div>";
    }
  }
?>
<script>
  var username='<?php 
    $id=$_SESSION['id'];
    $sql="SELECT * FROM users WHERE id='$id'";
    $result=$conn->query($sql);
    $rowUser=$result->fetch_assoc();
    $usernam=$rowUser['username'];
    echo $username;
  ?>';
  var id='<?php echo $_SESSION['id']; ?>';
</script>
<script src="javascript/deleteComment.js"></script>
<script src="javascript/comment.js"></script>
