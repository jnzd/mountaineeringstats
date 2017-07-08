<?php
include '../header.php';

session_destroy();

header("location: ../start.php");
?>