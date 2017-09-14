<?php
$title="GPX Upload";
include 'header.php';
include 'db.php';
?>
<h1>GPX Upload</h1>
<div class="Error">
	<?php
		if(isset($_SESSION['uploadError'])){
			echo $_SESSION['uploadError'];
		}
	?>
</div>
<div class="upload">
	<form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
		<input class="uploadInput" type="text" name="title" placeholder="Titel"><br>
		<input class="uploadInput" type="text" name="description" placeholder="Beschreibung"><br>
		<select name="sport">
			<option selected="selected" value="null">Wähle eine Sportart</option>
			<option value="jogging">Joggen</option>
			<option value="hiking">Wandern</option>
			<option value="biking">Biken</option>
			<option value="skiing">Skifahren</option>
			<option value="skitour">Skitour</option>
			<option value="hochtour">Hochtour</option>
		</select><br>
		<input class="uploadInput" type="hidden" name="MAX_FILE_SIZE" value="50000000"><br> <!-- Maximal 50 Megabyte -->
		<input class="uploadInput" type="file" name="xml" id="xml" placeholder="Aktivität"><br>
		<input class="uploadInput" type="submit" name="upload" value="hochladen"><br><br>
	</form>
</div>
<?php
  include 'footer.php';
?>
