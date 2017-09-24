<?php
	$urlInclude = true;
	include '../header.php';
	include '../db.php';
	include '../parsers/parse.gpx.php';
	$_SESSION['uploadError'] = "";
	$user_id = $_SESSION['id'];
	$username = $_SESSION['username'];
	$sport = "";
	$actPath = "";
	$type = "";
	$thumbnail = "";
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
		if($_POST['sport'] == "snowboard"){
			$sport="snowboard";
		}
	}else{
		$_SESSION['uploadError']="Keine Sportart ausgewählt";
		header("Location: ../upload.php");
		exit;
	}
	$extension = pathinfo($_FILES['xml']['name'], PATHINFO_EXTENSION);
	if($extension == "gpx"){
		$type = "gpx";
		$actPath='activities/'.$type.'/'.$username.$dateTime.'.'.$extension;
		$filename=$username.$dateTime.$extension;
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
	$values = gpx("../".$actPath);
	$dateTime = $values['dateTime'];
	$timestamp = $dateTime[0]->format('Y-m-d h:m');
	$sql = "INSERT INTO activities (sport, type, user_id, actTime, actPath, title, description, filename) VALUES ('$sport', '$type', '$user_id', '$timestamp', '$actPath', '$title', '$description', '$filename')";
	$result = $conn->query($sql);
	$_SESSION['uploadError']="";
	header("Location: ../profile.php");
?>
