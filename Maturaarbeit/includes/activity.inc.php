<?php
  /**
   * users own activity
   */
  $name = $_GET['name'];
  $edit = "<a href='editAct.php?name=$name'>Edit</a>";
  include 'includes/activityPublic.inc.php';
?>