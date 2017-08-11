<?php
	//$title="";
	include 'header.php';
  $publicUser = $_SESSION['publicUser'];
  $sql = "SELECT * FROM users WHERE username='$publicUser'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $title=$row['username'];
  $id = $row['id'];
?>
<div id="profileheader">
  <img class="circle" src="<?php echo $row['pic_path'];?>" height="120" width="120">
	<h1>
	<?php
		echo $publicUser;
	?>
	</h1>
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
