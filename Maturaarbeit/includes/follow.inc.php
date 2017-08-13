<?php
  $sql = "INSERT INTO followers (followingUser, followedUser, followingID00followedID, followingID, followedID)	VALUES ('$followingUser', '$followedUser', '$followingID00followedID', '$followingID', '$followedID')";
  $result = $conn->query($sql);
?>
