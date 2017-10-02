<?php
//$title="";
include 'header.php';
$id = $_SESSION['id'];
?>
<div id="profileheader">
	<a href="profile.php"><img class="circle" src="<?php echo $profilepic;?>" height="120" width="120"></a>

	<h1>
	<?php
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo $row['username'];
	?>
	</h1>
	<a href='settings.php'><img src="icons/gear.png" height="24" width="24"></a>
	<a href='profileinfo.php'><img src="icons/info.png" height="24" width="24"></a>

	<div id="bio">

	</div>

</div>

<div id="activity">
  <?php
    include 'includes/activity.inc.php';
  ?>
	<div id="map"></div>
	<?php
	echo "<a href='includes/deleteAct.inc.php'>Aktivität löschen</a>";
	echo "<br />";
	?>
</div>

</body>
</html>
