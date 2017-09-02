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
          echo "<h1><a clas='actTitle' href='../activity.php?name=".$filename."'>".$title."</a></h1><br />";
        }else{
          echo "<h1><a class='actTitle' href='../activityPublic.php?name=".$filename."&username=".$username."'>".$title."</a></h1><br />";
        }
        echo "<p>".$description."</p><br />";
        $values = gpx($row['actPath']);
        //echo "<img src='https://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318&markers=color:red%7Clabel:C%7C40.718217,-73.998284&key=AIzaSyA4g-swM5ElPgnAUJPg27C8Gwi3-kANoTg' height='150'>";
        echo "<img src='http://maps.googleapis.com/maps/api/staticmap?size=400x400&path=color:#79abfc|weight:5|";
        /*
        foreach($latitude as $lat){
          foreach($longitude as $long){
            echo $lat.",".$long."|";
          }
        }
        */
        echo "40.737102,-73.990318|40.749825,-73.987963|40.752946,-73.987384|40.755823,-73.986397";
        echo "&sensor=false&key=AIzaSyA4g-swM5ElPgnAUJPg27C8Gwi3-kANoTg' height='150'><br>";
        echo "<div id='comments".$actid."'>";
        include 'includes/displayComments.inc.php';
        echo "</div>";
        include 'includes/likeButton.inc.php';
        include 'includes/commentForm.inc.php';
      }
    }
  ?>
</div>
