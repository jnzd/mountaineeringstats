<?php
include 'db.php';
preg_match("/[^\/]+$/", $_SERVER['REQUEST_URI'], $matches);
if(isset($_SESSION['id']) & isset($matches[0])){
	$last_word = $matches[0];
	$sql = "SELECT * FROM users WHERE username='$last_word'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$rownr = $result->num_rows;
}
$title="mountaineeringstats";
include 'header.php';
if(isset($_SESSION['id']) & isset($rownr)){
	if($rownr>0){
		$row = $result->fetch_assoc();
		$publicUser = $last_word;
		include 'includes/publicProfile.inc.php';
	}else{
		include "includes/feed.inc.php";
	}
}else{
	include "includes/feed.inc.php";
}
?>
<?php
  include 'footer.php';
?>
