<?php
$title="Profil";
include 'header.php';
$id = $_SESSION['id'];
?>
<h1><?php 
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo $row['username']."<br>";?></h1>

<div class="links">
<!--<p><a href='addinfo.php'>Fuege mehr Informationen zu deinem Profil hinzu</a></p>  -->
<p><a href='settings.php'>Einstellungen</a></p>
<p><a href='profileinfo.php'>Informationen</a></p>
</div>


<div class="profilepic">
<img src="<?php echo $profilepic;?>" height="60" width="60">
</div>

</body>
</html>