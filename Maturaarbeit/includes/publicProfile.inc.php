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
        $filename = $row['filename'];
        $activityLink = "../activityPublic.php?name=".$filename."&username=".$publicUser;
        include 'activityPreview.inc.php';
      }
    }else{
      echo "<br /><h2>Dieser User hat noch keine Aktivitäten hochgeladen</h2>";
    }
  ?>
</div>

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

