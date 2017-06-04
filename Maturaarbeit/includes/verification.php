<?php
$title="Willkommen";
include 'header.php';
include 'db.php';

if(isset($_SESSION['id'])){
	$username = $row['username'];
	$confirm_code = $row['confirm_code'];
	$confirm_link = "http://localhost:8080/Maturaarbeit/includes/confirmed.inc.php?username=".$username."&code=".$confirm_code;
	
	echo $_SESSION['message'];
	
	echo "<h1>Verify</h1>";
	echo "<p>Bestaetige deine E-Mail Adresse</p>";
	echo "<a href=".$confirm_link.">".$confirm_link."</a><br>";
}
?>



</body>
</html>