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
	if(!$values){
		$_SESSION['uploadError']="Die Datei enthält keine Zeit-Daten und ist deshalb nicht kompatibel mit Mountaineeringstats.";
		header("Location: ../upload.php");
		exit;
	}
	$dateTime = $values['dateTime'];
	$longitude = $values['longitudePHP'];
	$latitude = $values['latitudePHP'];
	$latlng = "{lat: ".$latitude[0].", lng: ".$longitude[0]."}";
	$timestamp = $dateTime[0]->format('Y-m-d h:m');
	/**
	 * generate random 9 character integer
	 * check if it is already used
	 */
	$rownr = 1;
	while($rownr>0){
		//every digit must exist 9 times in the seed
		$seed = str_split('0123456789'
										 .'0123456789'
										 .'0123456789'
										 .'0123456789'
										 .'0123456789'
										 .'0123456789'
										 .'0123456789'
										 .'0123456789'
										 .'0123456789');
		shuffle($seed);
		$rand = '';
		foreach (array_rand($seed, 9) as $k){
			$rand .= $seed[$k];
		}
		$sql = "SELECT * FROM activities WHERE randomID='$rand'";
		$result = $conn->query($sql);
		$rownr = $result->num_rows;
		/**
		 * check if first character is zero
		 * if so $rand isn't an int
		 */
		$firstChar = $rand[0];
		if($firstChar==0){
			$rownr = 1;
		}
	}
	$sql = "INSERT INTO activities (sport, type, user_id, actTime, actPath, title, description, filename, randomID, coordinates) VALUES ('$sport', '$type', '$user_id', '$timestamp', '$actPath', '$title', '$description', '$filename','$rand','$latlng')";
	$result = $conn->query($sql);
	$_SESSION['uploadError']="";
	header("Location: ../profile.php");
?>
