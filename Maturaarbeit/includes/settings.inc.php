<?php
	include '../header.php';
	include '../db.php';
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM users WHERE id='$id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	//stores the current database entries
	$username = $row['username'];
	$email = $row['email'];
	$time = $row['dt_modified'];
	$changed = false;
	//if-Statements check wether certain changes were entered or not
	if(!empty($_POST['username'])){ //check if username changed
		if($_POST['username'] != $username){
			$username = $conn->escape_string ($_POST['username']);
			// check if username is available
			$sql = "SELECT * FROM users WHERE username='$username'";
			$result = $conn->query($sql);
			if($result->num_rows==0){
				$changed = true;
			}else{
				$_SESSION['error'] = "Benutzername wird bereits verwendet";
				header("Location: ../settings.php");
			}
		}
	}
	if(!empty($_POST['email'])){
		if($_POST['email'] != $email){ //chekc if email changed
			$email = $conn->escape_string ($_POST['email']);
			//check if email is available
			$sql = "SELECT * FROM users WHERE email='$email'";
			$result = $conn->query($sql);
			if($result->num_rows==0){
				$changed = true;
			}else{
				$_SESSION['error'] .= "E-Mail-Adresse wird bereits verwendet";
				header("Location: ../settings.php");
			}
		}else{
			$_SESSION['error'] = "Keine Änderungen vorgenommen";
			header("Location: ../settings.php");
		}
	}
	if($changed){
		$time = date("Y-m-d H:i:s");
		$sql = "UPDATE users SET username='$username', email='$email', dt_modified='$time' WHERE id = '$id'";
		$result = $conn->query($sql);
		$_SESSION['error'] = "Änderungen gespeichert";
		header("Location: ../settings.php");
	}
?>
