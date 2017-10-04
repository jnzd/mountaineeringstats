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
	<link rel="icon" href="icons/logoIcon.png">
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
			<div class="headerOuter">
				<div class="headerInner">
					<!--navigation links-->
					<ul class="header">
						<!--Logo-->
						<li>
							<a class="logo headerLink" href="index.php"></a>
						</li>
						<!--searchbar-->
						<li class="left">
							<form class="search" action="includes/search.inc.php" method="post">
								<input class="search" type="text" name="search" placeholder="Suchen">
							</form>
						</li>
						<!-- upload button -->
						<li class="right">
							<a class="uploadLink headerLink"></a>
						</li>
						<!-- notification dropdown -->
						<li>
							<?php 
								include "includes/checkNotifications.inc.php";
								if($notifications){
									echo "<button onclick=notifications() class='notifications headerButton'></button>";
								}else{
									echo "<button onclick=noNotifications() class='noNotifications headerButton'></button>";
								}
							?>
						</li>
						<?php include 'includes/notifications.inc.php';?>
						<!-- profile dropdown -->
						<li>
							<div class="dropdown">
								<button class="dropdown headerButton dropbtn" onclick="dropdown()"></button>
								<style>
									.dropdown{
										background: url(<?php echo $profilepic; ?>);
										background-repeat: no-repeat;
										background-size: 30px 30px;
										background-position: center;
										height: 100%;
										width: 60px;
									}
								</style>
								<div class="dropdown-content" id="dropdown-content">
									<a class="dropdwnLink" href="profile.php">Profil</a>
									<a class="dropdwnLink" href="includes/logout.inc.php">Abmelden</a>
									<a class="dropdwnLink" href="settings.php">Einstellungen</a>
								</div>
							</div>
							<script src="javascript/dropdown.js"></script>
						</li>
					</ul>
				</div>
			</div>
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
