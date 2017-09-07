<?php
	include 'db.php';
	include 'vendor/autoload.php';
	include 'includes/resultToArray.inc.php';
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
	<link rel="icon" href="icons/logo.png">
	<title><?php echo $title; ?></title>
	<link href="style.css" rel="stylesheet" type="text/css">
<!-- Google maps polyline meta -->
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
</head>

<body>
<?php
		if(isset($_SESSION['id'])){
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$username = $row['username'];
		if($row['confirmed']==0 && $_SERVER['REQUEST_URI']!='/verification.php'){
			header("Location: verification.php");
		}
		$profilepic = $row['pic_path'];
//Header anzeigen
		?>
		<header>
		  <div class="header-inner">
<!--Website logo -->
				<a href="index.php" id="logo"><img src="icons/logo.png" height="24" width="24"></a>
<!--Suchleiste-->
				<div id="search">
					<form class="search" action="includes/search.inc.php" method="post">
						<input type="text" name="search" placeholder="Suchen">
					</form>
				</div>
<!-- menu for mobile design -->
				<nav>
		      <a href="#" id="menu-icon"></a>
		      <ul>
<!-- Links im Header -->
						<li><a href="upload.php"><img src="icons/upload.png" height="24" width="24"></a></li>
						<li><a href="notifications()">BENACHRICHTIGUNGEN</a></li>

						<div class="dropdown">
							<button onclick="myFunction()" class="dropbtn">Dropdown</button>
							<div id="dropdown" class="dropdown-content">
								<?php include 'includes/notifications.inc.php';?>
							</div>
						</div>

						<script>
						/* When the user clicks on the link, 
						toggle between hiding and showing the dropdown content */
						function notifications() {
								document.getElementById("myDropdown").classList.toggle("show");
						}

						// Close the dropdown if the user clicks outside of it
						window.onclick = function(event) {
							if (!event.target.matches('.dropbtn')) {

								var dropdowns = document.getElementsByClassName("dropdown-content");
								var i;
								for (i = 0; i < dropdowns.length; i++) {
									var openDropdown = dropdowns[i];
									if (openDropdown.classList.contains('show')) {
										openDropdown.classList.remove('show');
									}
								}
							}
						}
						</script>


		        <?php echo "<li><a href='profile.php'><img class='circle' src=".$profilepic." height='24' width='24'></a></li>"?>
		        <li><a href="includes/logout.inc.php">ABMELDEN</a></li>
		      </ul>
		    </nav>
		  </div>
		</header>
		<div id="con">
		<div id="content">
		<?php
	}else{
		if($title != 'Hi' && $title != 'Willkommen'){
			header('location: start.php');
		}
	}
?>
