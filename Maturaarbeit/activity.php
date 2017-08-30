<?php
//$title="";
include 'header.php';
$id = $_SESSION['id'];
?>
<div id="profileheader">
	<?php
		include 'includes/profileheader.inc.php';
	?>
</div>

<div id="activity">
  <?php
    include 'includes/activity.inc.php';
  ?>
</div>

</body>
</html>
