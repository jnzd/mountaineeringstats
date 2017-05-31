<?php
$title="Willkommen";
include 'header.php';
include 'db.php';
?>
<h1>Willkommen</h1>

<?php
	if(isset($_SESSION['id']))
	{
		echo $_SESSION['id'];
	} else {
		header("location: start.php");
	}
?>
</body>
</html>