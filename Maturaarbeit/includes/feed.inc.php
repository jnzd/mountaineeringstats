<div class="feed">
  <?php
    include 'parsers/parse.gpx.php';
    require 'vendor/emcconville/google-map-polyline-encoding-tool/src/Polyline.php';
    if(isset($_SESSION['id'])){
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
      $result = $conn->query($sql);
      $rownr = $result->num_rows;
      if($rownr>0){
        $rows = resultToArray($result);
        $result->free();
        foreach($rows as $row) {
          include 'includes/feedPreview.inc.php';
        }
      }else{
        echo "<h2>Du hast noch keine Aktivitäten hochgeladen und du folgst noch niemandem</h2>";
      }
    }else{
      header("location: start.php");
    }
   
  ?>
</div>
