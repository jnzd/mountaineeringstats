<?php
//include '../header.php';
include '../db.php';

session_start();
$_SESSION['message'] = "";
$username = $conn->escape_string($_POST['username']);
$email = $conn->escape_string($_POST['email']);
$password = md5($_POST['password']);
if($_POST['password'] != $_POST['confirmpassword']){
	if($sql = "SELECT * FROM users WHERE email='$email'"){
		if($sql = "SELECT * FROM users WHERE username='$username'"){
			$_SESSION['message'] = "Die Passwörter stimmen nicht überein und diese E-Mail Adresse sowie dieser Benutzername werden bereits verwendet";
			header("Location: ../start.php");
		}else{
			$_SESSION['message'] = "Die Passwörter stimmen nicht überein und diese E-Mail Adresse wird bereits verwendet";
			header("Location: ../start.php");
		}
	}else{
		if($sql = "SELECT * FROM users WHERE username='$username'"){
			$_SESSION['message'] = "Die Passwörter stimmen nicht überein und dieser Benutzername wird bereits verwendet";
			header("Location: ../start.php");
		}
		//Nachricht, falls die Passwoerter nicht uebereinstimmen
		$_SESSION['message'] =  "Diese Passwörter stimmen nicht ueberein";
		header("Location: ../start.php");
	}
}else{
	if($sql = "SELECT * FROM users WHERE email='$email'"){
		if($sql = "SELECT * FROM users WHERE username='$username'"){
			$_SESSION['message'] = "Diese E-Mail Adresse und dieser Benutzername werden bereits verwendet";
			header("Location: ../start.php");
		}else{
			$_SESSION['message'] = "Diese E-Mail Adresse wird bereits verwendet";
			header("Location: ../start.php");
		}
	}else{
		//Is the user name already registered?
		if($sql = "SELECT * FROM users WHERE username='$username'"){
			$_SESSION['message'] = "Dieser Benutzername wird bereits verwendet";
			header("Location: ../start.php");
		}else{
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

			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			//leert die Session message
			$_SESSION['message'] = "";
			//Weiterleitung zur verification-Seite
			header("Location: ../verification.php");
		}
	}
}
?>
