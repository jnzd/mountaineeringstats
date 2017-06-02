<?php
include '../header.php';
include '../db.php';
$user_id = $_SESSION['id'];
$sport = "";
$path = "";

include '../db.php';	
	if($_POST['sport'] != "null"){
		if($_POST['sport'] == "jogging"){
			echo 1;
			$sport="jogging";
		}
		if($_POST['sport'] == "hiking"){
			echo 2;
			$sport="hiking";
		}
		if($_POST['sport'] == "biking"){
			echo 3;
			$sport="biking";
		}
		if($_POST['sport'] == "skiing"){
			echo 4;
			$sport="skiing";
		}
		if($_POST['sport'] == "climbing"){
			echo 5;
			$sport="climbing";
		}
	}else{
		//$_SESSION['message']="Bitte waehle eine Sportart aus";
		header("loacation: ../upload.php");
	}
	
	if(isset($_POST['upload']) && isset($_FILES['xml'])){
		$extension = pathinfo($_FILES['xml']['name'], PATHINFO_EXTENSION);
		echo $extension;//test
		
		if($extension == "gpx"){//zu xml aendern!!!!!
			$path='activities/gpx/'.$_FILES['xml']['name'];
			echo $path;//test
			
			$path_inc = '../'.$path;
			copy($_FILES['xml']['tmp_name'], $path_inc);
		}else{
			$_SESSION['message']="Bitte lade eine XML Datei hoch.";
			//header("location: ../upload.php");
		}
	}else{
		$_SESSION['message']="Bitte lade eine Datei hoch.";
	}	
	
	$sql = "INSERT INTO activities (path, sport, user-id) VALUES ('$path', '$sport', '$user_id')";
	$result = $conn->query($sql);
	
	$_SESSION['message']="";
	//header("location: ../profile.php");
?>