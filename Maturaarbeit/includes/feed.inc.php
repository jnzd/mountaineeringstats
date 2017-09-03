<div id="feed">
  <?php
    include 'parsers/parse.gpx.php';
    function resultToArray($result) {
      $rows = array();
      while($row = $result->fetch_assoc()) {
          $rows[] = $row;
      }
      return $rows;
    }
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
        echo "<a href='".$username."'><img class='circle' src='".$picPath."' height='40' width='40'></a>";
        if($userID == $_SESSION['id']){
          echo "<h1><a clas='actTitle' href='../activity.php?name=".$filename."'>".$title."</a></h1>";
        }else{
          echo "<h1><a class='actTitle' href='../activityPublic.php?name=".$filename."&username=".$username."'>".$title."</a></h1>";
        }
        echo "<p>".$description."</p>";
        $values = gpx($row['actPath']);
        $latitude = $values['latitudePHP'];
        $longitude = $values['longitudePHP'];        
        /*$track = [];
        foreach($latitude as $lat){
          foreach($longitude as $long){
            array_push($track, array($lat,$long));
          }
        }
        $encodedCoords = Polyline::encode($track);
        echo "<img src='http://maps.googleapis.com/maps/api/staticmap?size=400x400&path=color:#79abfc|weight:5|enc".$encodedCoords."&sensor=false&key=AIzaSyA4g-swM5ElPgnAUJPg27C8Gwi3-kANoTg' height='150'><br>";*/
        echo "<div id='comments".$actid."'>";
        include 'includes/displayComments.inc.php';
        echo "</div>";
        include 'includes/likeButton.inc.php';
        include 'includes/commentForm.inc.php';
      }
    }
  ?>
</div>
