<?php
  include '../db.php';
  $commentID = $_GET['id'];
  $sql = "DELETE FROM comments WHERE commentID='$commentID'";
  $result = $conn->query($sql);
  printf("Errormessage: %s\n", $conn->error);
?>