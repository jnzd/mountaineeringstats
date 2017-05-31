<?php
//include '../header.php';
include '../db.php';

$email = $_POST['email'];
$password = md5($_POST['password']);;

echo $email."<br>";
echo $password."<br>";

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($query);

if(!$row = mysqli_fetch_assoc($result)){
	echo "E-Mail oder Passwort ist falsch";
	echo "<a href=../start.php>Erneut probieren</a>";
}else{
	if(remember){//Platzhalter
		setcookie('email', $email, 'password', $password, time()+60*60*365);
	}
	
	session_start();
	$_SESSION['id'] = $row['id'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
	
	header("Location: ../main.php");	
}
?>