<?php
$username=$_GET['username'];
	//$title="";
	include 'header.php';
  $sql = "SELECT * FROM users WHERE username='$username'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $title=$row['username'];
  $id = $row['id'];
?>
<div id="profileheader">
  <a href="<?php echo $username;?>"><img class="circle" src="<?php echo $row['pic_path'];?>" height="120" width="120"></a>
	<h1>
	<?php
		echo $username;
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
