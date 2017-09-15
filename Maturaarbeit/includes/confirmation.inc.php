<?php
include '../db.php';
session_start();
if(isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$username = $row['username'];
	$email = $row['email'];
	$confirm_code = $row['confirm_code'];
	$message = "Bitte bestätige deine E-Mailadresse mit dem folgenden link: https://mountaineeringstats.com/includes/confirming.inc.php?username=".$username."&code=".$confirm_code;
	$header = "From: noreply@mountaineeringstats.com\r\n";
	$header .= "Mime-Version: 1.0\r\n";
	$header .= "Content-type: text/plain; charset=utf-8";
	mail($email,"E-Mail Bestätigung", $message, $header);
	echo $id.$email."<br>".$message;
	header("Location: ../verification.php");
}else{
	header("Location: ../index.php");
}
?>
