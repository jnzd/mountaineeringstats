<?php
include '../header.php';
include '../db.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
//stores the current database entries
$username = $row['username'];
$email = $row['email'];
$first = $row['first'];
$last = $row['last'];
$gender = $row['gender'];
$time = $row['dt_modified'];
$changed = false;
//if-Statements check wether certain changes were entered or not
if(!empty($_POST['username'])){
	$username = $conn->escape_string ($_POST['username']);
	$changed = true;
}
if(!empty($_POST['email'])){
	$email = $conn->escape_string ($_POST['email']);
}
if($_POST['first'] != ""){
	$first = $conn->escape_string ($_POST['first']);
	$changed = true;
}
if($_POST['last'] != ""){
	$last = $conn->escape_string ($_POST['last']);
	$changed = true;
}
if($_POST['gender'] != "null"){
	if($_POST['gender'] == "male"){
		$gender="male";
	}else{
		$gender="female";
	}
	$changed = true;
}
if($changed){
	$time = date("Y-m-d H:i:s");
	$sql = "UPDATE users SET username='$username', email='$email', first='$first', last='$last', gender='$gender', dt_modified='$time' WHERE id = '$id'";
	$result = $conn->query($sql);
	header("Location: ../profile.php");
}
?>
