<?php
	$title="Entdecken";
	include 'header.php';
	$id = $_SESSION['id'];
?>
<div class="worldmap">
	<?php
		include 'includes/discover.inc.php';
	?>
</div>
<?php
  include 'footer.php';
?>
