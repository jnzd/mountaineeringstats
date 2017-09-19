<div class="startBackground">
	<?php
		$title="mountaineeringstats | Wilkommen";
		include 'header.php';
		include 'db.php';

		if(isset($_SESSION['id'])){
			/**
			 * define confirmation link again for link resend
			 * display link for new confirmation email
			 */
			$username = $row['username'];
			$confirm_code = $row['confirm_code'];
			$confirm_link = "/includes/confirmed.inc.php?username=".$username."&code=".$confirm_code;
			echo "<p>Bestätige deine E-Mail Adresse</p>";
			echo "<a href='includes/confirmation.inc.php'>E-Mail erneut senden</a><br>";
		}
	?>
	<?php
		include 'footerStart.php';
	?>
</div>
