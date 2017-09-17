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
$password = $row['password'];
$first = $row['first'];
$last = $row['last'];
$gender = $row['gender'];
$pic_path = $row['pic_path'];
$pic_path_old = $pic_path;
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
if(!empty($_POST['password'])){
	if(md5($_POST['password'])==md5($_POST['confirmpassword'])){
		$password = md5($_POST['password']);
		$changed = true;
	}
	else{
		$_SESSION['message'] = "Passwörter stimmen nicht ueberein. Passwort konnte nicht aktualisiert werden.";
	}
}
if(is_uploaded_file($_FILES['pic']['tmp_name'])){
	$extension = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
	$pic_path='profilepics/'.$username.$extension;
	if(preg_match("!image!", $_FILES['pic']['type'])){
		$pic_path_inc = '../'.$pic_path;
		copy($_FILES['pic']['tmp_name'], $pic_path_inc);
		if($pic_path_old != "profilepics/standard.png"){
			unlink('../'.$pic_path_old);
			$changed = true;
		}
	}else{
		$_SESSION['message'] = "Datei ist kein Bild.";
	}
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
}
$sql = "UPDATE users SET username='$username', email='$email', password='$password', first='$first', last='$last', pic_path='$pic_path', gender='$gender', dt_modified='$time' WHERE id = '$id'";
$result = $conn->query($sql);
header("Location: ../profile.php");
?>
