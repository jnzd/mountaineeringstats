<?php
	$followingID = $_POST['followingID'];
	$followedID = $_POST['followedID'];
	$followingID00followedID = $_POST['followingID00followedID'];
	$followingUser = $_POST['followingUser'];
	$followedUser = $_POST['followedUser'];

	$sql = "INSERT INTO followers (followingUser, followedUser, followingID00followedID, followingID, followedID)	VALUES ('$followingUser', '$followedUser', '$followingID00followedID', '$followingID', '$followedID')";
	$result = $conn->query($sql);  scriptconsole.log()
?>
<script>console.log(<?php echo $followingID."<br>".$followedID."<br>".$followingID00followedID."<br>".$followingUser."<br>".$followedUser; ?>)</script>