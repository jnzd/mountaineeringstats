<?php
include '../header.php';
include '../db.php';
$_SESSION['uploadError'] = "";
$user_id = $_SESSION['id'];
$username = $_SESSION['username'];
$sport = "";
$path = "";
$type = "";
$content = "";
$time = date("Y-m-d H:i:s");
$dateTime = date("Y-m-d-H-i-s");//for file names, because file names can't contain colons

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
			$path='activities/'.$type.'/'.$username.$dateTime.'.'.$extension;
			$path_inc = '../'.$path;
			copy($_FILES['xml']['tmp_name'], $path_inc);
			$file = simplexml_load_file($path_inc);
			echo $file;
		}else{
			$_SESSION['uploadError']="Datei ist nicht im GPX Format oder keine Datei ausgewählt";
			/*if(isset($_SESSION['uploadError'])){
				$_SESSION['uploadError']="Datei ist nicht im GPX Format oder keine Datei ausgewählt";
			}else{
				$_SESSION['uploadError'].="<br />Datei ist nicht im GPX Format oder keine Datei ausgewählt";
			}*/
			echo $_SESSION['uploadError'];
			header("Location: ../upload.php");
			exit;
		}
	/*}else{
		$_SESSION['uploadError']="Keine Datei ausgewählt";
		echo $_SESSION['uploadError'];
		header("Location: ../upload.php");
	}*/
	$sql = "INSERT INTO activities (sport,type,user_id,time,path) VALUES ($sport','$type','$user_id','$time',$path)";
	$result = mysqli_query($conn, $sql);

	$_SESSION['uploadError']="";
	header("Location: ../profile.php");
?>
