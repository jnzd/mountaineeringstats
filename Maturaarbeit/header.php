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
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
</head>

<body>
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
			header("Location: verification.php");
		}
		//check if logged in, but url is from password reset, which is a contradiction...
		if(isset($_SESSION['id'])&&$_SERVER['REQUEST_URI']=='/passwordResetForm.php'){
			header("location: index.php");
		}
		//display header if logged in and confirmed
		?>
		<header>
			<!--Logo-->
			<div class="logo">
				<a href="index.php" class="logo"><img src="icons/logo.png" height="30" width="30"></a>
			</div>
			<!--searchbar-->
			<div class="search">
				<form class="search" action="includes/search.inc.php" method="post">
					<input class="search" type="text" name="search" placeholder="Suchen">
				</form>
			</div>
			<!--menu for mobile design-->
			<nav>
				<ul>
					<!--navigation links-->
					<li><a href="upload.php"><img src="icons/upload.png" height="30" width="30"></a></li>
					<li><a href="javascript:notifications();" class="dropbtn"><?php 
						include "includes/checkNotifications.inc.php";
						if($notifications == true){
							echo "<img src='icons/notifications.png' height='30' width='30'>";
						}else{
							echo "<img src='icons/noNotifications.png' height='30' width='30'>";
						}
					?>
					</a></li>
					<?php include 'includes/notifications.inc.php';?>
					<li><a href="profile.php"><img class="circle" src="<?php echo $profilepic; ?>" height="30" width="30"></a></li>
					<li><a href="includes/logout.inc.php">ABMELDEN</a></li>
				</ul>
			</nav>
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
