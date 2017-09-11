<?php
  session_start();
  include '../db.php';
  $email = $_POST['email'];
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = $conn->query($sql);
  $rownr = $result->num_rows; 
  if($rownr>0){
    $rownr = $result->num_rows;
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $id = $row['id'];
    
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
		$resetSeed = getToken();
    $resetCode = md5($resetSeed);
    $sql = "UPDATE users SET resetHash='$resetCode' WHERE id='$id'";
    $result = $conn->query($sql);

    $result = mysqli_query($conn, $sql);
    //email message
    $message = "Hallo ".$username."\nUm Ihr Passwort zurückzusetzen klicken Sie bitte den folgenden Link. https://mountaineeringstats.com/passwordResetForm.php?code=".$resetCode."&id=".$id."\n\nFalls Sie diese Nachricht fälschlicherweise erhalten und Ihr Passwort nicht zurücksetzen wollen, ignorieren Sie diese Nachricht.";
    //send email
    $header = "From: noreply@mountaineeringstats.com\r\n";
    $header .= "Mime-Version: 1.0\r\n";
    $header .= "Content-type: text/plain; charset=utf-8";
    mail($email,"Passwort Zurücksetzen", $message, $header);
    $_SESSION['error'] = "";
    $_SESSION['registrationError'] = "E-Mail wurde versandt";
    header("location: ../start.php");
  }else{
    $_SESSION['error'] = "Diese E-Mail Adresse ist nicht registriert";
    header("location: ../passwordReset.php");
  }
?>