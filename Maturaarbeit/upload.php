<?php
include 'header.php';
include 'db.php';
?>

<div id="uploadError">
	<?php
		if(isset($_SESSION['uploadError'])){
			echo $_SESSION['uploadError'];
		}
	?>
</div>

<h1>Hochladen</h1>
<div id="upload">
	<form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
		<select name="sport">
			<option selected="selected" value="null">Wähle eine Sportart</option>
			<option value="jogging">Joggen</option>
			<option value="hiking">Wandern</option>
			<option value="biking">Biken</option>
			<option value="skiing">Skifahren</option>
			<option value="skitour">Skitour</option>
			<option value="hochtour">Hochtour</option>
		</select><br>
		<input type="hidden" name="MAX_FILE_SIZE" value="50000000"><br> <!-- Maximal 50 Megabyte -->
		<input type="file" name="xml" id="xml" placeholder="Aktivität"><br>
		<input type="submit" name="upload" value="hochladen"><br><br>
	</form>
</div>

</body>
</html>
