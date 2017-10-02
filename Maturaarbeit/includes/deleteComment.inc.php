<?php
  include '../db.php';
  $commentID = $_POST['commentID'];
  $sql = "DELETE FROM comments WHERE commentID='$commentID'";
  $result = $conn->query($sql);
?>