<?php
include 'db.php';
preg_match("/[^\/]+$/", $_SERVER['REQUEST_URI'], $matches);
$last_word = $matches[0];
$sql = "SELECT * FROM users WHERE username='$last_word'";
$result = $conn->query($sql);
$rownr = $result->num_rows;

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$title="mountaineeringstats";
include 'header.php';

if($rownr>0){
	$row = $result->fetch_assoc();
	include 'includes/publicProfile.inc.php';
}else{
	echo "
	<h1>Willkommen</h1>
	<div id='feed'>


		<?php
			//display news feed
		?>
	</div>
	";
}
?>
<?php include 'footer.php'; ?>

</body>
</html>
