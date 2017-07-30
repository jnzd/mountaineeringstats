<?php
$title="Willkommen";
include 'header.php';
include 'db.php';

if(isset($_SESSION['id'])){
	$username = $row['username'];
	$confirm_code = $row['confirm_code'];
	$confirm_link = "/includes/confirmed.inc.php?username=".$username."&code=".$confirm_code;
	//$confirm_link = "/includes/confirmed.inc.php?username=".$username."&code=".$confirm_code;

	echo "<p>Bestätige deine E-Mail Adresse</p>";
	echo "<a href='includes/confirmation.inc.php'>E-Mail erneut senden</a><br>";
}
?>


</body>
</html>
