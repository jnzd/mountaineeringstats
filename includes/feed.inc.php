<div class="feed">
  <?php
    include 'parsers/parse.gpx.php';
    require 'vendor/emcconville/google-map-polyline-encoding-tool/src/Polyline.php';
    if(isset($_SESSION['id'])){
      
      echo "<div class='activityPreview'>";
      echo "<h2>Herzlich willkommen auf Mountaineeringstats</h2>";
      echo "<p>Das ist die Startseite. Hier siehst du alle Aktivitäten von deinen Freunden zusammen mit deinen eigenen</p>";
      echo "</div>";
      $id = $_SESSION['id'];
      $sql = "SELECT * FROM followers WHERE followingID='$id'";
      $result = $conn->query($sql);
      $rownr = $result->num_rows; 
      $sql = "SELECT * FROM activities WHERE user_id='$id'";
      /**
       * check if the user follows any other users
       * extend SQL statement for each user the user is following
       */
      if($rownr>0){
        $rows = resultToArray($result);
        $result->free();
        foreach($rows as $row) {
          $followedID = $row['followedID'];
          $sql .= " OR user_id='$followedID'";
        }
      }
      $sql .= " ORDER BY actTime DESC";
      $result = $conn->query($sql);
      $rownr = $result->num_rows;
      if($rownr>0){
        $rows = resultToArray($result);
        $result->free();
        foreach($rows as $row) {
          include 'includes/feedPreview.inc.php';
        }
      }else{
        echo "<div class='activityPreview'>";
        echo "<p>Du hast noch keine Aktivitäten hochgeladen und folgst noch niemandem</p>";
        echo "<p>Lade deine erste Aktivität mit dem Plus-Icon im Header hoch oder suche deine Freunde über die Suchleiste</p>";
        echo "</div>";
      }
    }else{
      header("location: start.php");
    }
  ?>
</div>
<script>
  var username='<?php 
    if(isset($_SESSION['id'])){
      $id=$_SESSION['id'];
      $sql="SELECT * FROM users WHERE id='$id'";
      $result=$conn->query($sql);
      $rowUser=$result->fetch_assoc();
      $username=$rowUser['username'];
      echo $username;
    }
  ?>';
  var id='<?php 
    if(isset($_SESSION['id'])){
      echo $_SESSION['id'];
    }
  ?>';
</script>
<script src="javascript/deleteComment.js"></script>
<script src="javascript/comment.js"></script>
