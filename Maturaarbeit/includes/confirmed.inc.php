<?php
include '../db.php';




$username = $_GET['username'];
$confirm_code = $_GET['code'];

$sql = "SELECT * FROM users WHERE username='$username' AND confirm_code='$confirm_code'";
$result = $conn->query($$sql);
if(!$row = $result->fetch_assoc()){
	$_SESSION['message'] = "Link ungueltig";
	header("location: verification.php");
}else{
	$sql = "UPDATE users SET confirmed='1', dt_created= 'CURRENT_TIMESTAMP' WHERE username = '$username'";
	$result = $conn->query($sql);
	header("Location: ../main.php");
}
?>