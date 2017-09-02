<?php
include 'db.php';
preg_match("/[^\/]+$/", $_SERVER['REQUEST_URI'], $matches);
if(isset($matches[0])){
	$last_word = $matches[0];
	$sql = "SELECT * FROM users WHERE username='$last_word'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$rownr = $result->num_rows;
}
$title="mountaineeringstats";
include 'header.php';
if(isset($rownr)){
	if($rownr>0){
		$row = $result->fetch_assoc();
		$publicUser = $last_word;
		include 'includes/publicProfile.inc.php';
	}else{
		echo "<h1>Willkommen</h1>
		<div id='feed'>";
			//display news feed
		echo "</div>";
	}
}else{
	echo "<h1>Willkommen</h1>
	<div id='feed'>";
		//display news feed
	echo "</div>";
}
?>
<?php
  include 'footer.php';
?>
