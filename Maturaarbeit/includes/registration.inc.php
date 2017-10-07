<?php
//include '../header.php';
include '../db.php';
session_start();
$_SESSION['registrationError'] = "";
$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
/**
 * validation for registration input
 */
/**
	* make sure username only contains A-Z, a-z, 0-9
	*/
if(!preg_match("/^[a-zA-Z0-9]+$/", $username)||preg_match("/\\s/", $username)){
	$_SESSION['registrationError'] = "Der Benutzername enthält unzulässige Zeichen. Im Benutzernamen dürfen nur Gross- und Kleinbuchstaben sowie Ziffern von 0 bis 9 verwendet werden";
	header("Location: ../start.php");
}
if($_POST['password'] != $_POST['confirmpassword']){
	/**
	 * passwords don't match
	 * check for further errors
	 * => check if email is already used
	 */
	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = $conn->query($sql);
	$num = $result->num_rows;
	if($num>0){
		/**
		 * passwords don't match
		 * email is already used
		 * => check if username is already used
		 */
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = $conn->query($sql);
		$num = $result->num_rows;
		if($num>0){
			/**
		 * passwords don't match
		 * email is already used
		 * username is already used
		 * => set error message
		 * => reload page
		 */
			$_SESSION['registrationError'] = "Die Passwörter stimmen nicht überein und diese E-Mail Adresse sowie dieser Benutzername werden bereits verwendet";
			header("Location: ../start.php");
		}else{
			/**
		 * passwords don't match
		 * email is already used
		 * => set error message
		 * => reload page
		 */
			$_SESSION['registrationError'] = "Die Passwörter stimmen nicht überein und diese E-Mail Adresse wird bereits verwendet";
			header("Location: ../start.php");
		}
	}else{
		/**
		 * passwords don't match
		 * check for further errors
		 * => check if username is already used
		 */
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = $conn->query($sql);
		$num = $result->num_rows;
		if($num>0){
			/**
			* passwords don't match
			* username is already used
			* => set error message
			* => reload page
			*/
			$_SESSION['registrationError'] = "Dieser Benutzername wird bereits verwendet und die Passwörter stimmen nicht überein";
			header("Location: ../start.php");
		}
	}
	/**
		* passwords don't match
		* => set error message
		* => reload page
		*/
	$_SESSION['registrationError'] = "Die Passwörter stimmen nicht überein";
	header("Location: ../start.php");
}else{
	/**
	 * check if email is already used
	 */
	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = $conn->query($sql);
	$num = $result->num_rows;
	if($num>0){
		/**
		 * email is already used
		 * => check if username is already used
		 */
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = $conn->query($sql);
		$num = $result->num_rows;
		if($num>0){
			/**
			 * email is already used
			 * username is already used
			 * => set error message
			 * => reload page
			 */
			$_SESSION['registrationError'] = "Dieser Benutzername und diese E-Mail werden bereits verewendet";
			header("Location: ../start.php");
		}else{
			/**
			 * email is already used
			 * => set error message
			 * => reload page
			 */
			$_SESSION['registrationError'] = "Diese E-Mail Adresse wird bereits verwendet";
			header("Location: ../start.php");
		}
	}else{
		/**
		 * => check if username is already used
		 */
		$sql = "SELECT * FROM users WHERE username='$username'";
		$result = $conn->query($sql);
		$num = $result->num_rows;
		if($num>0){
			/**
			 * username is already used
			 * => set error message
			 * => reload page
			 */
			$_SESSION['registrationError'] = "Dieser Benutzername wird bereits verwendet";
			header("Location: ../start.php");
		}
		/**
		 * set confirmation code
		 */
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
		/**
		 * write code to database
		 */
		$sql = "INSERT INTO users (username, email, password, confirm_code)	VALUES ('$username', '$email', '$password', '$confirm_code')";
		$result = $conn->query($sql);
		/**
		 * set email message
		 * send email
		 */
		$message = "Bitte bestätige deine E-Mailadresse mit dem folgenden link: https://mountaineeringstats.com/includes/confirming.inc.php?username=".$username."&code=".$confirm_code;
		$header = "From: noreply@mountaineeringstats.com\r\n";
		$header .= "Mime-Version: 1.0\r\n";
		$header .= "Content-type: text/plain; charset=utf-8";
		mail($email,"E-Mail Bestätigung", $message, $header);
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$_SESSION['id'] = $row['id'];
		/**
		 * clear error message
		 * redirect to verification page
		 */
		$_SESSION['registrationError'] = "";
		header("Location: ../verification.php");
	}
}
?>
