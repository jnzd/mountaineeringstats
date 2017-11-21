<?php
include '../db.php';
session_start();
$_SESSION['loginError']= "";
$email = $conn->real_escape_string($_POST['email']);
/**
 * compare email and password with database
 */
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$hash = $row['password'];
if(password_verify($_POST['password'], $hash)){
	$_SESSION['id'] = $row['id'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['email'] = $email;
	if(isset($_POST['remember'])){
		function onLogin($user) {
			$token = GenerateRandomToken(); // generate a token, should be 128 - 256 bit
			storeTokenForUser($user, $token);
			$cookie = $user . ':' . $token;
			$mac = hash_hmac('sha256', $cookie, SECRET_KEY);
			$cookie .= ':' . $mac;
			setcookie('rememberme', $cookie);
		}

		
	}
	header("Location: ../index.php");
}else{	$_SESSION['loginError']= "E-Mail oder Passwort ist falsch";
	header("location: ../start.php");
}
?>
