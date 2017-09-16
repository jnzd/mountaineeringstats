<div id="feed">
  <?php
    include 'parsers/parse.gpx.php';
    require 'vendor/emcconville/google-map-polyline-encoding-tool/src/Polyline.php';
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM followers WHERE followingID='$id'";
    $result = $conn->query($sql);
    $rownr = $result->num_rows; 
    //Prepare SQL statement
    $sql = "SELECT * FROM activities WHERE user_id='$id'";
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
    }
  ?>
</div>
