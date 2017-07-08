<?php
	include 'db.php';
	include 'vendor/autoload.php';
//Starte session in auf jeder Seite
	session_start();
	if(!isset($title)){
		$title='Home';
	}
//Fehlermeldungen leeren
	if(!isset($_SESSION['message'])){
		$_SESSION['message'] = "";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link href="style.css" rel="stylesheet" type="text/css">
<!-- Google maps polyline meta -->
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
</head>

<body>
<?php
	if(isset($_SESSION['id'])){
//setzt die id fuer die folgende sql Variable
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$username = $row['username'];
		if($row['confirmed']==0 && $_SERVER['REQUEST_URI'] != '/Maturaarbeit/verification.php'){
		//if($row['confirmed']==0 && $_SERVER['REQUEST_URI'] != '/verification.php'){
			header("location: verification.php");
		}
		$profilepic = $row['pic_path'];
//Header anzeigen
		?>
		<header>
		  <div class="header-inner">
<!--Website logo -->
			    <a href="index.php" id="logo"></a>
<!--Suchleiste-->
					<div id="search">
				    <form class="search" action="includes/search.inc.php" method="post">
				      <input type="text" name="searchfield" placeholder="Suchen">
				     </form>
					</div>
<!-- menu fuer mobiles design -->
				<nav>
		      <a href="#" id="menu-icon"></a>
		      <ul>
<!-- Links im Header -->
		        <li><a href="map.php">KARTE</a></li>
		        <li><a href="parse.php">PARSER</a></li>
		        <li><a href="feed.php">FEED</a></li>
		        <li><a href="index.php">STARTSEITE</a></li>
		        <li><a href="upload.php">HOCHLADEN</a></li>
		        <?php echo "<li><a href='profile.php'><img class='circle' src=".$profilepic." height='24' width='24'></a></li>"?>
		        <li><a href="includes/logout.inc.php">ABMELDEN</a></li>
		      </ul>
		    </nav>
		  </div>
		</header>
		<div id="content">
		<?php
	}else{
		if($title != 'Hi' && $title != 'Willkommen'){
			header('location: start.php');
		}
	}
?>
