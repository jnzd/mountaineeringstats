<?php
	include 'header.php';
	include 'db.php';
	$publicUser=$_GET['username'];
  $sql = "SELECT * FROM users WHERE username='$publicUser'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
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
<div id="activity">
  <?php
    include 'includes/activityPublic.inc.php';
  ?>
	<div id="map"></div>
</div>

</body>
</html>
