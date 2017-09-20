<?php
  /**
   * destroy session in order that session id gets unset and therefore the header detects no one as being logged in
   */
  include '../header.php';
  session_destroy();
  header("location: ../start.php");
?>
