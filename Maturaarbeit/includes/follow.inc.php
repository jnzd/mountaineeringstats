<?php
	include '../db.php';
	$followingID = $_POST['followingID'];
	$followedID = $_POST['followedID'];
	$followingID00followedID = $_POST['followingID00followedID'];
	$followingUser = $_POST['followingUser'];
	$followedUser = $_POST['followedUser'];
	$message = '<p><a href="'.$followingUser.'">'.$followingUser.'</a> hat dich abonniert</p>';

	$sql = "INSERT INTO followers (followingUser, followedUser, followingID00followedID, followingID, followedID, message)	VALUES ('$followingUser', '$followedUser', '$followingID00followedID', '$followingID', '$followedID', '$message')";
	$result = $conn->query($sql);
?>