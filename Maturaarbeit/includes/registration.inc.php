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
		function crypto_rand_secure($min, $max) {
			$range = $max - $min;
			if ($range < 0) return $min; // not so random...
			$log = log($range, 2);
			$bytes = (int) ($log / 8) + 1; // length in bytes
			$bits = (int) $log + 1; // length in bits
			$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
			do {
					$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
					$rnd = $rnd & $filter; // discard irrelevant bits
			} while ($rnd >= $range);
			return $min + $rnd;
		}
		function getToken($length=32){
			$token = "";
			$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
			$codeAlphabet.= "0123456789";
			for($i=0;$i<$length;$i++){
					$token .= $codeAlphabet[crypto_rand_secure(0,strlen($codeAlphabet))];
			}
			return $token;
		}
		$confirmSeed = getToken();
		$confirm_code = md5($confirmSeed);
		//safes code to db
		$sql = "INSERT INTO users (username, email, password, confirm_code)	VALUES ('$username', '$email', '$password', '$confirm_code')";
		$result = $conn->query($sql);
		//email message
		$message = "Bitte bestätige deine E-Mailadresse mit dem folgenden link: https://mountaineeringstats.com/includes/confirming.inc.php?username=".$username."&code=".$confirm_code;
    $header = "From: noreply@mountaineeringstats.com\r\n";
    $header .= "Mime-Version: 1.0\r\n";
    $header .= "Content-type: text/plain; charset=utf-8";
		//send email
		mail($email,"E-Mail Bestätigung", $message, $header);
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$_SESSION['id'] = $row['id'];
		//empties error messages
		$_SESSION['registrationError'] = "";
		header("Location: ../verification.php");
	}
}
?>
