<?php
  $followingID = 25;//$_POST['followingID'];
  $followedID = 37;//$_POST['followedID'];
  $followingID00followedID = 250037;//$_POST['followingID00followedID'];
  $followingUser = "jonasdegelo";//$_POST['followingUser'];
  $followedUser = "sles4silver";//$_POST['followedUser'];

  $sql = "INSERT INTO followers (followingUser, followedUser, followingID00followedID, followingID, followedID)	VALUES ('$followingUser', '$followedUser', '$followingID00followedID', '$followingID', '$followedID')";
  $result = $conn->query($sql);
?>
