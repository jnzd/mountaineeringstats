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
	<div id="map"></div>
	<?php
	echo "<a href='includes/deleteAct.inc.php?name=".$_GET['name']."'>Aktivität löschen</a>";
	echo "<br />";
	?>
</div>

</body>
</html>
