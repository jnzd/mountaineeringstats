<?php
	//include important files
	include 'db.php';
	include 'vendor/autoload.php';
	include 'includes/resultToArray.inc.php';
  use phpGPX\phpGPX;
	//start session on every page
	session_start();
	if(!isset($title)){
		$title='Mountaineeringstats';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="icons/logo.png">
	<title><?php echo $title; ?></title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<!-- Google maps polyline meta -->
	<!--<meta name="viewport" content="initial-scale=1.0, user-scalable=no">-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
	//check if logged in
	if(isset($_SESSION['id'])){
		//if yes
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		//retrieve data about user from database
		$username = $row['username'];
		$profilepic = $row['pic_path'];
		//check if account has been confirmed
		if($row['confirmed']==0 && $_SERVER['REQUEST_URI']!='/verification.php'){
			echo "<body>";
			header("Location: verification.php");
		}
		//check if logged in, but url is from password reset, which is a contradiction...
		if(isset($_SESSION['id'])&&$_SERVER['REQUEST_URI']=='/passwordResetForm.php'){
			header("location: index.php");
		}
		//display header if logged in and confirmed
		?>
		<body>
		<header>
			<!--navigation links-->
			<ul class="header">
				<!--Logo-->
				<li class="left">
					<a href="index.php" class="logo"><img src="icons/logo.png" height="30" width="30"></a>
				</li>
				<!--searchbar-->
				<li class="center">
					<form class="search" action="includes/search.inc.php" method="post">
						<input class="search" type="text" name="search" placeholder="Suchen">
					</form>
				</li>
				<!-- upload button -->
				<li class="right"><a href="upload.php"><img src="icons/upload.png" height="30" width="30"></a></li>
				<!-- notification dropdown -->
				<li><a href="javascript:notifications();" class="dropbtn"><?php 
					include "includes/checkNotifications.inc.php";
					if($notifications){
						echo "<img src='icons/notifications.png' height='30' width='30'>";
					}else{
						echo "<img src='icons/noNotifications.png' height='30' width='30'>";
					}
				?>
				</a></li>
				<?php include 'includes/notifications.inc.php';?>
				<!-- profile dropdown -->
				<li>
					<div class="dropdown"><a class="dropbtn" href="profile.php"><img class="circle" src="<?php echo $profilepic; ?>" height="30" width="30"></a>
						<div class="dropdown-content">
							<a class="dropdwn" href="profile.php">Profil</a>
							<a class="dropdwn" href="includes/logout.inc.php">Abmelden</a>
							<a class="dropdwn" href="settings.php">Einstellungen</a>
						</div>
					</div>
				</li>
			</ul>

			
		</header>
		<!-- open divs -->
		<div id="con">
		<div id="content">
		<?php
	}else{
		//if not logged in
		if($title != 'Hi' && $title != 'Willkommen'){
			header('location: start.php');
		}
	}
?>
