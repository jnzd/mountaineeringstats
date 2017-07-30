<?php
include '../header.php';
include '../db.php';
$_SESSION['uploadError'] = "";
$user_id = $_SESSION['id'];
$username = $_SESSION['username'];
$sport = "";
$actPath = "";
$type = "";
$content = "";
$actTime = date("Y-m-d H:i:s");
$dateTime = date("Y-m-d-H-i-s");//for file names, because file names can't contain :
include '../db.php';
	if($_POST['sport'] != "null"){
		if($_POST['sport'] == "jogging"){
			$sport="jogging";
		}
		if($_POST['sport'] == "hiking"){
			$sport="hiking";
		}
		if($_POST['sport'] == "biking"){
			$sport="biking";
		}
		if($_POST['sport'] == "skiing"){
			$sport="skiing";
		}
		if($_POST['sport'] == "hochtour"){
			$sport="hochtour";
		}
		if($_POST['sport'] == "skitour"){
			$sport="skitour";
		}
	}else{
		$_SESSION['uploadError']="Keine Sportart ausgewählt";
		header("Location: ../upload.php");
		exit;
	}
	//if(isset($_POST['upload']) && isset($_FILES['xml'])){
		$extension = pathinfo($_FILES['xml']['name'], PATHINFO_EXTENSION);
		if($extension == "gpx"){
			$type = "gpx";
			$actPath='activities/'.$type.'/'.$username.$dateTime.'.'.$extension;
			$filename='$username.$dateTime.'.'.$extension;'
			$actPath_inc = '../'.$actPath;
			copy($_FILES['xml']['tmp_name'], $actPath_inc);
			$file = simplexml_load_file($actPath_inc);
			if(isset($_POST['title'])){
				$title=$_POST['title'];
				if(isset($_POST['description'])){
					$description=$_POST['description'];
				}else{
					$description="";
				}
			}else{
				$_SESSION['uploadError']="Kein Titel gewählt";
				header("Location: ../upload.php");
				exit;
			}
		}else{
			$_SESSION['uploadError']="Datei ist nicht im GPX Format oder keine Datei ausgewählt";
			echo $_SESSION['uploadError'];
			header("Location: ../upload.php");
			exit;
		}
	$sql = "INSERT INTO activities (sport, type, user_id, actTime, actPath, title, description, filename) VALUES ('$sport', '$type', '$user_id', '$actTime', '$actPath', '$title', '$description', '$filename')";
	$result = mysqli_query($conn, $sql);

	$_SESSION['uploadError']="";
	header("Location: ../profile.php");
?>
