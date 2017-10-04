<?php
 /**
	* receive data from followbutton
	* write follow relationship to database
	*/
	include '../db.php';
	$followingID = $_POST['followingID'];
	$followedID = $_POST['followedID'];
	$followingID00followedID = $_POST['followingID00followedID'];
	$followingUser = $_POST['followingUser'];
	$followedUser = $_POST['followedUser'];
	$sql = "INSERT INTO followers (followingUser, followedUser, followingID00followedID, followingID, followedID) VALUES ('$followingUser', '$followedUser', '$followingID00followedID', '$followingID', '$followedID')";
	$result = $conn->query($sql);
	$sql = "INSERT INTO notifications (receivingID, sendingID, type, link) VALUES ('$followedID','$followingID','follower','$followingUser')";
	$result = $conn->query($sql);
?>