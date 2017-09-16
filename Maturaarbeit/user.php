<?php
	$publicUser = $_GET['user'];
	$title = "Profil | ".$username;
	include 'header.php';
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM users WHERE username='$publicUser'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if($id == $row['id']){
		header("location: profile.php");
	}else{
		include 'includes/publicProfile.inc.php';
		include 'footer.php';
	}
?>