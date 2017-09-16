<?php
	include 'db.php';
	preg_match("/[^\/]+$/", $_SERVER['REQUEST_URI'], $matches);
	if(isset($matches[0])){
		$last_word = $matches[0];
		$sql = "SELECT * FROM users WHERE username='$last_word'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$rownr = $result->num_rows;
		if($rownr>0){
			header("location: user.php?user=".$last_word);
		}else{
			$title = "mountaineeringstats";
			include 'header.php';
			include "includes/feed.inc.php";
			include 'footer.php';
		}
	}else{
		$title = "mountaineeringstats";
		include 'header.php';
		include "includes/feed.inc.php";
		include 'footer.php';
	}
?>
