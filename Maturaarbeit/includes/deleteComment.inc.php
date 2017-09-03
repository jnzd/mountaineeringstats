<?php
  include '../db.php';
  $commentID = $_GET['id'];
  //$url = $_GET['url'];
  $sql = "DELETE FROM comments WHERE commentID='$commentID'";
  $result = mysqli_query($conn, $sql);
  header("location: ../index.php");
?>