<?php
  //$title="";
  include 'header.php';
  $id = $_SESSION['id'];
?>
<div class="feed"><!-- necessary to center header-->
  <div id="profileheader">
    <?php
      include 'includes/profileheader.inc.php';
    ?>
  </div>
</div>
<div id="activity">
  <?php
    include 'includes/activity.inc.php';
  ?>
</div>
<?php
  include 'footer.php';
?>
