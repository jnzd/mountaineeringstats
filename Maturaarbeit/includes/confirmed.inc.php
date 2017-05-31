<?php
include '../db.php';




$username = $_GET['username'];
$confirm_code = $_GET['code'];

$sql = "SELECT * FROM users WHERE username='$username' AND confirm_code='$confirm_code'";
$result = mysqli_query($conn, $sql);
if(!$row = mysqli_fetch_assoc($result)){
	$_SESSION['message'] = "Link ungueltig";
	header("location: verification.php");
}else{
	$sql = "UPDATE users SET confirmed='1' WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);
	header("Location: ../main.php");
}
?>