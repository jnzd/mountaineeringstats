<?php
	include 'db.php';
	include 'vendor/autoload.php';

	//Starte session in auf jeder Seite
	session_start();
	if(!isset($title)){
		$title="Home";
	}
	if(!isset($_SESSION['message'])){
		$_SESSION['message'] = "";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
</head>

<?php
	if(isset($_SESSION['id'])){
		$id = $_SESSION['id'];//setzt die id fuer die folgende sql Variable
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$username = $row['username'];
		if($row['confirmed']==0 && $_SERVER['REQUEST_URI'] != '/Maturaarbeit/verification.php'){
			header("location: verification.php");
		}

		$profilepic = $row['pic_path'];
		echo "<header>
				<nav>
					<ul>
						<li><a href='map.php'>KARTE</a></li>
						<li><a href='parse.php'>PARSER</a></li>
						<li><a href='feed.php'>FEED</a></li>
						<li><a href='index.php'>STARTSEITE</a></li>
						<li><a href='upload.php'>HOCHLADEN</a></li>
						<li><a href='profile.php'><img class='circle' src='".$profilepic."'height='24' width='24'></a></li>
						<li><a href='includes/logout.inc.php'>ABMELDEN</a></li>
					</ul>
				</nav>
			</header>";
	}else{
		if($title != "Hi" && $title != "Willkommen"){
			header("location: start.php");
		}
	}
?>

<div id="body">

<body>
