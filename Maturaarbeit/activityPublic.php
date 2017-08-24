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
			include 'followButton.inc.php';
		?>
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
