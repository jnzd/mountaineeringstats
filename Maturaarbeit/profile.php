<?php
$title="Profil";
include 'header.php';
$id = $_SESSION['id'];
?>


<div id="profileheader">
	<!-- <div id="profilepic"> -->
		<img class="circle" src="<?php echo $profilepic;?>" height="120" width="120">
	<!--</div>  -->
	
	<h1>
	<?php 
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo $row['username'];
	?>
	</h1>
	
	<!--<div id="settings">  -->
		<a href='settings.php'><img src="icons/gear.png" height="24" width="24"></a>
		<a href='profileinfo.php'><img src="icons/info.png" height="24" width="24"></a>
	<!-- </div>-->
	
	<!-- <div id="bio">-->
	
	<!-- </div> -->
</div>

<div id="feed">



</div>

</body>
</html>