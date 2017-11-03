<?php
	$title="Profil";
	include 'header.php';
	$id = $_SESSION['id'];
?>
<div class="feed">
	<?php
		include 'includes/profileheader.inc.php';
		include 'includes/profilefeed.inc.php';
	?>
</div>
<?php
  include 'footer.php';
?>
