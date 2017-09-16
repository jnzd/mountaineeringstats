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
        echo "<div class='activityPreview'>";
        $userID=$row['user_id'];
        $sqlUser = "SELECT * FROM users WHERE id='$userID'";
        $resultUser = $conn->query($sqlUser);
        $rowUser = $resultUser->fetch_assoc();
        $username = $rowUser['username'];
        $picPath = $rowUser['pic_path'];
        $title = $row['title'];
        $actid = $row['id'];
        $sport = $row['sport'];
        $path = $row['actPath'];
        $type = $row['type'];
        $actTime = $row['actTime'];
        $filename = $row['filename'];
        $description = $row['description'];
        echo "<div class='actHeader'>";
        echo "<div class='profilePicture'>";
        echo "<a href='".$username."'><img class='circle' src='".$picPath."' height='40' width='40'></a>";
        echo "</div>";
        echo "<div class='actName'>";
        if($userID == $_SESSION['id']){
          echo "<h1><a class='actTitle' href='../activity.php?name=".$filename."'>".$title."</a></h1>";
        }else{
          echo "<h1><a class='actTitle' href='../activityPublic.php?name=".$filename."&username=".$username."'>".$title."</a></h1>";
        }
        echo "<p>".$description."</p>";
        echo "</div>";
        echo "</div>";
        $values = gpx($row['actPath']);
        echo "<div class='staticMap'>";
        include 'includes/staticMap.inc.php';
        echo "</div>";
        //link comment section to according activity with actid
        echo "<div id='comments".$actid."'>";
        include 'includes/displayComments.inc.php';
        echo "</div>";
        include 'includes/likeButton.inc.php';
        include 'includes/commentForm.inc.php';
        echo "</div>";
      }
    }
  ?>
</div>
