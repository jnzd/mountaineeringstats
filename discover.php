<?php
	$title="Entdecken";
	include 'header.php';
	$id = $_SESSION['id'];
?>
<style>
	#con {
		min-height: calc(100vh - 95px);
		position:relative;
	}
	#content{
		margin: auto;
		padding-bottom: 92px;
	}
</style>
<?php
	include 'includes/discover.inc.php';
  include 'footer.php';
?>
