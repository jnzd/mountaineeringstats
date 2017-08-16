<?php
  $sql = "SELECT * FROM users WHERE username='$publicUser'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $title=$row['username'];
  $id = $row['id'];
  if($id == $_SESSION['id']){
    header("Location: profile.php");
  }
?>
<div id="profileheader">
  <img class="circle" src="<?php echo $row['pic_path'];?>" height="120" width="120">
	<h1>
	<?php
		echo $publicUser;
  ?>

	</h1>
  <div id="followButton">
    <?php
      $followingID = $_SESSION['id'];
      $followedID = $row['id'];
      $followingUser = $_SESSION['username'];
      $followedUser = $row['username'];
      $followingID00followedID = $followingID."00".$followedID;
      $followSearch = "SELECT * FROM followers WHERE followingID00followedID='$followingID00followedID'";
      $resultFollowers = $conn->query($followSearch);
      $rowFollowers = $resultFollowers->fetch_assoc();
      $rownrFollowers = $resultFollowers->num_rows;
      if($rownrFollowers>0){
        echo "<button type='button' onclick='unfollow()'>Abonniert</button>";
      }else{
        echo "<button type='button' onclick='follow()'>Folgen</button>";
      }
    ?>
    <script src="node_modules\jquery\dist\jquery.js"></script>
    <script>
      function follow() {
        $.ajax({
          type:'post',
          url:'includes/follow.inc.php',
          complete: function (response) {
            $('#followButton').html('<button type="button" onclick="unfollow()">Abonniert</button>');
          },
        });
        return false;
      }
      function unfollow() {
        $.ajax({
          type:'post',
          url:'includes/unfollow.inc.php',
          complete: function (response) {
            $('#followButton').html('<button type="button" onclick="follow()">Folgen</button>');
          }
        });
        return false;
      }
    </script>
  </div>
	<div id="bio">

	</div>
</div>

<div id="feed">
  <?php
    include 'parsers/parse.preview.gpx.php';
    function resultToArray($result) {
      $rows = array();
      while($row = $result->fetch_assoc()) {
          $rows[] = $row;
      }
      return $rows;
    }
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
        echo "<h1><a class='actTitle' href='../activityPublic.php?name=".$filename."&username=".$username."'>".$title."</a></h1><br />";
        echo "<p>".$description."</p><br />";
        gpx($row['actPath']);
      }
    }else{
      echo "<br /><h2>Dieser User hat noch keine Aktivitäten hochgeladen</h2>";
    }
  ?>
  </div>
</body>
</html>
