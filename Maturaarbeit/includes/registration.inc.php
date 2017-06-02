<?php
//include '../header.php';
include '../db.php';

//testet, ob die beiden Passwoerter uebereinstimmen
if($_POST['password'] == $_POST['confirmpassword']){
	$username = $mysqli->escape_string($_POST['username']);
	$email = $mysqli->escape_string($_POST['email']);
	$password = md5($_POST['password']);
	
	//Code zur E-Mail Bestaetigung
	$confirm_code = md5($username);
	
	//speichert die entsprechenden Angaben in der Datenbank
	$sql = "INSERT INTO users (username, email, password, confirm_code)	VALUES ('$username', '$email', '$password', '$confirm_code')";
	$result = mysqli_query($conn, $sql);
	
	//E-Mail Nachricht
	$message_email = "Bitte bestaetige deine E-Mailadresse mit dem folgenden link: http://localhost:8080/Maturaarbeit/confirmed.php?username = $username&code=$confirm_code";
	
	//versendet E-Mail
	//mail($email,"E-Mail-Bestaetigung", $message_email);
	
	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
	
	//startet eine Session, damit der Benutzer sich nicht erst noch anmelden muss
	session_start();
	$_SESSION['id'] = $row['id'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
	
	//leert die Session message
	$_SESSION['message'] = "";
	//Weiterleitung zur verification-Seite
	header("Location: ../verification.php");
}else{
	//Nachricht, falls die Passwoerter nicht uebereinstimmen
	echo "Passwoerter stimmen nicht ueberein";
}
?>