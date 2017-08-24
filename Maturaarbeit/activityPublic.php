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
	<?php
		include 'includes/profileheaderPublic.inc.php';
	?>
</div>
<div id="activity">
  <?php
    include 'includes/activityPublic.inc.php';
  ?>
	<div id="map"></div>
</div>

</body>
</html>
