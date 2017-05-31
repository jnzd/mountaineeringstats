<?php
include '../header.php';
include '../db.php';
$user_id = $_SESSION['id'];
$sport = "";
$xml_path = "";

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
		if($_POST['sport'] == "climbing"){
			$sport="climbing";
		}
	}else{
		//$_SESSION['message']="Bitte waehle eine Sportart aus";
		header("loacation: ../upload.php");
	}
	
	if(isset($_POST['upload']) && isset($_FILES['xml'])){
		$extension = pathinfo($_FILES['xml']['name'], PATHINFO_EXTENSION);
		echo $extension;
		
		if($extension == "JPG"){//zu xml aendern!!!!!
			$xml_path='activities/gpx/'.$_FILES['xml']['name'];
			echo $xml_path;
			
			$xml_path_inc = '../'.$xml_path;
			copy($_FILES['xml']['tmp_name'], $xml_path_inc);
		}else{
			$_SESSION['message']="Bitte lade eine XML Datei hoch.";
			//header("location: ../upload.php");
		}
	}else{
		$_SESSION['message']="Bitte lade eine Datei hoch.";
	}	
	
	$sql = "INSERT INTO activities (xml_path, sport, user-id) VALUES ('$xml_path', '$sport', '$user_id')";
	$result = mysqli_query($conn, $sql);
	
	echo $sql;
	echo $result;
	
	$_SESSION['message']="";
	//header("location: ../profile.php");
?>