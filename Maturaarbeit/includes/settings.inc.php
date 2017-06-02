<?php
include '../header.php';
include '../db.php';
$id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//Speichert die jetzigen Angaben aus der Datenbank
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];
$first = $row['first'];
$last = $row['last'];
$ort = $row['ort'];
$plz = $row['plz'];
$gender = $row['gender'];
$street = $row['street'];
$strnr = $row['strnr'];
$pic_path = $row['pic_path'];
$pic_path_old = $pic_path;
$country = $row['country'];
$birthdate = $row['birthdate'];


//if-Statements testen, ob die jeweiligen Angaben eingegeben wurden
if(!empty($_POST['username'])){
	$username = mysqli::escape_string ($_POST['username']);
}
if(!empty($_POST['email'])){
	$email = mysqli::escape_string ($_POST['email']);
}
if(!empty($_POST['password'])){
	if(md5($_POST['password'])==md5($_POST['confirmpassword'])){
		$password = md5($_POST['password']);
	}
	else{
		$_SESSION['message'] = "Passwoerter stimmen nicht ueberein. Passwort konnte nicht aktualisiert werden.";
	}
}
if($_POST['first'] != ""){
	$first = mysqli::escape_string ($_POST['first']);
}
if($_POST['last'] != ""){
	$last = mysqli::escape_string ($_POST['last']);
}
if($_POST['ort'] != ""){
	$ort = mysqli::escape_string ($_POST['ort']);
}
if($_POST['plz'] != ""){
	$plz = mysqli::escape_string ($_POST['plz']);
}
if($_POST['street'] != ""){
	$street = mysqli::escape_string ($_POST['street']);
}
if($_POST['strnr'] != ""){
	$strnr = mysqli::escape_string ($_POST['strnr']);
}
if($_POST['country'] != ""){
	$country = mysqli::escape_string ($_POST['country']);
}
if($_POST['gender'] != "null"){
	if($_POST['gender'] == "male"){
		$gender="male";
	}else{
		$gender="female";
	}
}
if(is_uploaded_file($_FILES['pic']['tmp_name'])){
	$pic_path='profilepics/'.$id.$_FILES['pic']['name'];
	if(preg_match("!image!", $_FILES['pic']['type'])){
		$pic_path_inc = '../'.$pic_path;
		copy($_FILES['pic']['tmp_name'], $pic_path_inc);
		if($pic_path_old != "profilepics/standard.png"){
			echo "hey";
			unlink('../'.$pic_path_old);			
		}		
	}else{
		$_SESSION['message'] = "Datei ist kein Bild.";
	}
}


//speichert die geaenderten Angaben in der Datenbank
$sql = "UPDATE users SET username='$username', email='$email', password='$password', first='$first', last='$last', ort='$ort', plz='$plz', street='$street', strnr='$strnr',  pic_path = '$pic_path', gender='$gender' WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

//zum Testen
echo "<a href='../profile.php'>profile</a>";

header("Location: ../profile.php");
?>