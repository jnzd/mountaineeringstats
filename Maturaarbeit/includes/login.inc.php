<?php
//include '../header.php';
include '../db.php';

$email = $conn->escape_string($_POST['email']);//email Eingabe speichern
$password = md5($_POST['password']);//Passwort wird gehasht

//Passwort und E-Mail mit Datenbank vergleichen
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if(!$row = $result->fetch_assoc()){
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