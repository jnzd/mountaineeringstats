<?php
  /**
   * delete comment from database
   * delete corresponding notification
   */
  include '../db.php';
  $commentID = $_POST['commentID'];
  $sql = "SELECT * FROM comments WHERE commentID='$commentID'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $notificationsid = $row['notificationsid'];
  $sql = "DELETE FROM notifications WHERE id='$notificationsid'";
  $result = $conn->query($sql);
  $sql = "DELETE FROM comments WHERE commentID='$commentID'";
  $result = $conn->query($sql);
?>