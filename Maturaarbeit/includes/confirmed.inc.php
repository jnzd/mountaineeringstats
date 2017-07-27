<?php
include '../db.php';
if(isset($_SESSION['id'])){
	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
//safes the current database entries
	$username = $row['username'];
	$email = $row['email'];
//Code zur E-Mail Bestaetigung
	$confirm_code = md5($username);
//E-Mail Nachricht
	$message = "Bitte bestätige deine E-Mailadresse mit dem folgenden link: https://mountaineeringstats.com/includes/confirmed.inc.php?username=".$username."&code=".$confirm_code;
//versendet E-Mail
	$headers = 'From: noreply@mountaineeringstats.com';
	mail($email,"E-Mail Bestätigung", $message, $headers);
	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
//Weiterleitung zu verification.php
	header("Location: ../verification.php");
}else{
	header("Location: ../index.php");
}
?>
