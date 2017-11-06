<?php
  include '../db.php';
  session_start();
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$username = $row['username'];
	$email = $row['email'];
  include 'profilesettings.inc.php'
?>