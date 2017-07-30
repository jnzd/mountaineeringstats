<?php
	include 'db.php';
	include 'vendor/autoload.php';
  use phpGPX\phpGPX;
//Starte session in auf jeder Seite
	session_start();
	if(!isset($title)){
		$title='Mountaineeringstats';
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
//confirmation link
	/*if(substr($_SERVER['REQUEST_URI'],0,14) == '/confirmed.php'){
		$username = $_GET['username'];
		$confirm_code = $_GET['code'];
		$sql = "SELECT * FROM users WHERE username='$username' AND confirm_code='$confirm_code'";
		$result = $conn->query($sql);
//Confirmation link invalid
		if(!$row = $result->fetch_assoc()){
			echo $sql;
			echo "<br />";
			echo $username;
			echo "<br />";
			echo $confirm_code;
			header("Location: index.php");
//confirmation link valid
		}else{
			$time = date("Y-m-d H:i:s");
			$sql = "UPDATE users SET confirmed='1', dt_created= '$time' WHERE username = '$username'";
			$result = $conn->query($sql);
			header("Location: confirmed.php");
			exit;
		}
	}else*/if(isset($_SESSION['id'])){
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$username = $row['username'];
		if($row['confirmed']==0 && $_SERVER['REQUEST_URI']!='/verification.php'){
			header("Location: verification.php");
			/*else{
				header("Location: verification.php");
			}*/
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
