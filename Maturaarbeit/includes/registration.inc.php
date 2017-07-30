<?php
//include '../header.php';
include '../db.php';
session_start();
$_SESSION['registrationError'] = "";
$username = $conn->escape_string($_POST['username']);
$email = $conn->escape_string($_POST['email']);
$password = md5($_POST['password']);

if($_POST['password'] != $_POST['confirmpassword']){
	$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	if(mysqli_num_rows($query)>0){//email
		//if both username and email are used and the passwords don't match------------------------------------------------
		$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
		if(mysqli_num_rows($query)>0){//username
			$_SESSION['registrationError'] = "Die Passwörter stimmen nicht überein und diese E-Mail Adresse sowie dieser Benutzername werden bereits verwendet";
			header("Location: ../start.php");
			//if the email is used and the passwords don't match----------------------------------------------------------------
		}else{
			$_SESSION['registrationError'] = "Die Passwörter stimmen nicht überein und diese E-Mail Adresse wird bereits verwendet";
			header("Location: ../start.php");
		}
	}else{
		//if the username is used and the passwords don't match---------------------------------------------------------------
		$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
		if(mysqli_num_rows($query)>0){//username
			$_SESSION['registrationError'] = "Dieser Benutzername wird bereits verwendet und die Passwörter stimmen nicht überein";
			header("Location: ../start.php");
		}
	}
//if only the passwords don't match-------------------------------------------------------------------------------------------
	$_SESSION['registrationError'] = "Die Passwörter stimmen nicht überein";
	header("Location: ../start.php");
}else{
	$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	if(mysqli_num_rows($query)>0){//email
		//if username and email are used-----------------------------------------------------------------------------------------
		$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
		if(mysqli_num_rows($query)>0){//username
			$_SESSION['registrationError'] = "Dieser Benutzername und diese E-Mail werden bereits verewendet";
			header("Location: ../start.php");
			//if the email is used---------------------------------------------------------------------------------------------
		}else{
			$_SESSION['registrationError'] = "Diese E-Mail Adresse wird bereits verwendet";
			header("Location: ../start.php");
		}
	}else{
		//if the username is used-------------------------------------------------------------------------------------------
		$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
		if(mysqli_num_rows($query)>0){//username
			$_SESSION['registrationError'] = "Dieser Benutzername wird bereits verwendet";
			header("Location: ../start.php");
		}
#######################################################################################################################
		//confirmation code
		$confirm_code = md5($username);
		//safes code to db
		$sql = "INSERT INTO users (username, email, password, confirm_code)	VALUES ('$username', '$email', '$password', '$confirm_code')";
		$result = mysqli_query($conn, $sql);
		//email message
		$message = "Bitte bestätige deine E-Mailadresse mit dem folgenden link: https://mountaineeringstats.com/includes/confirming.inc.php?username=".$username."&code=".$confirm_code;
		//send email
		$headers = 'From: noreply@mountaineeringstats.com';
		mail($email,"E-Mail Bestätigung", $message, $headers);
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);

		$_SESSION['id'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		//empties error messages
		$_SESSION['registrationError'] = "";
		header("Location: ../verification.php");
#######################################################################################################################
	}
}
?>
