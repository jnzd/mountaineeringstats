<?php
include '../db.php';
include '../header.php';
$sql = "DELETE FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
session_destroy();
header("location: ../start.php");
?>