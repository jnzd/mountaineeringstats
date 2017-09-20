<?php
	/**
	 * include this file on every page
	 * include important files
	 * start session
	 * set default title
	 */
	include 'db.php';
	include 'vendor/autoload.php';
	include 'includes/resultToArray.inc.php';
  use phpGPX\phpGPX;
	session_start();
	if(!isset($title)){
		$title='mountaineeringstats';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="icons/logo.png">
	<title><?php echo $title; ?></title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="node_modules\jquery\dist\jquery.js"></script>
</head>
<body>
<?php
	/**
	 * check if user is logged in
	 */
	if(isset($_SESSION['id'])){
		/**
		 * logged in
		 * => get information from database
		 * => check if account has been confirmed
		 */
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$username = $row['username'];
		$profilepic = $row['pic_path'];
		if($row['confirmed']==0 && $_SERVER['REQUEST_URI']!='/verification.php'){
			header("Location: verification.php");
		}
		/**
		 * display header
		 */
		?>
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
		<div id="con">
		<div id="content">
		<?php
	}else{
		/**
		 * if the user isn't logged in redirect to start.php
		 * unless the user is already on start.php, verification.php, passwordReset.php or passwordResetForm.php
		 * all these pages have the title "mountaineeringstats | Wilkommen"
		 */
		if($title != 'mountaineeringstats | Wilkommen'){
			header('location: start.php');
		}
	}
?>
