<?php
$title="Profil";
include 'header.php';
$id = $_SESSION['id'];
?>


<div id="profileheader">
	<h1>
	<?php 
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		echo $row['username']."<br>";
	?>
	</h1>

	<div id="links">
		<!--<p><a href='addinfo.php'>Fuege mehr Informationen zu deinem Profil hinzu</a></p>  -->
		<p><a href='settings.php'>Einstellungen</a></p>
		<p><a href='profileinfo.php'>Informationen</a></p>
	</div>
	
	
	<div id="profilepic">
		<img class="circle" src="<?php echo $profilepic;?>" height="120" width="120">
	</div>
	<div id="bio">
	
	
	</div>
</div>

<div id="feed">



</div>

</body>
</html>