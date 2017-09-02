<?php
$title="Profil";
include 'header.php';
$id = $_SESSION['id'];
?>
<div id="profileheader">
	<?php
		include 'includes/profileheader.inc.php';
	?>
</div>

<div id="feed">
	<?php
		include 'includes/profilefeed.inc.php';
	?>
</div>
<?php
  include 'footer.php';
?>
