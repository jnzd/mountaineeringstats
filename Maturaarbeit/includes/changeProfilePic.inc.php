<?php
include '../header.php';
include '../db.php';
$id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

//stores the current database entries
$pic_path = $row['pic_path'];
$pic_path_old = $pic_path;
$time = $row['dt_modified'];
$changed = false;
//if-Statements check wether certain changes were entered or not
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
    $_SESSION['error'] = "Datei ist kein Bild.";
    header("location: ../settings.php?sub=profilepic");
	}
}
if($changed){
	$time = date("Y-m-d H:i:s");
  $sql = "UPDATE users SET pic_path='$pic_path', dt_modified='$time' WHERE id = '$id'";
  $result = $conn->query($sql);
  header("Location: ../profile.php");
}
?>
