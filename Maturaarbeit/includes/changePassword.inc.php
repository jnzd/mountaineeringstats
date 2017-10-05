<?php
include '../header.php';
include '../db.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
//stores the current database entries;
$time = $row['dt_modified'];
$password = $row['password'];
$changed = false;
//if-Statements check wether certain changes were entered or not
if(!password_verify($_POST['oldpassword'], $password)){
  $_SESSION['error'] = "Altes Passwort stimmt nicht";
  header("location: settings.php?sub=password");
}
if(!empty($_POST['password'])){
	if($_POST['password']=$_POST['confirmpassword']){
		$password = password_hash($_POSt['password'], PASSWORD_DEFAULT);
		$changed = true;
	}
	else{
		$_SESSION['error'] = "Neue Passwörter stimmen nicht überein";
    header("location: settings.php?sub=password");
	}
}
if($changed){
	$time = date("Y-m-d H:i:s");
}
$sql = "UPDATE users SET password='$password', dt_modified='$time' WHERE id = '$id'";
$result = $conn->query($sql);
$_SESSION['error'] = "";
header("Location: ../profile.php");
?>
