<?php
$title="GPX Upload";
include 'header.php';
include 'db.php';
include 'parsers/parse.gpx.php';
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
		<div class="uploadBlock">
			<label class="uploadLabel" for="title">Titel</label>
			<input class="uploadInput" id="title" type="text" name="title" placeholder="Titel"><br>
		</div>
		<div class="uploadBlock">
			<label class="uploadLabel" for="description">Beschreibung</label>
			<input class="uploadInput" id="description" type="text" name="description" placeholder="Beschreibung"><br>
		</div>
		<div class="uploadBlock">
			<label class="uploadLabel" for="sport">Sportart</label>
			<select name="sport">
				<option selected="selected" id="description" value="null">Wähle eine Sportart</option>
				<option value="jogging">Joggen</option>
				<option value="hiking">Wandern</option>
				<option value="biking">Biken</option>
				<option value="skiing">Skifahren</option>
				<option value="snowboard">Snowboard</option>
				<option value="skitour">Skitour</option>
				<option value="hochtour">Hochtour</option>
			</select><br>
		</div>
		<div class="uploadBlock">
			<input class="uploadInput" type="hidden" name="MAX_FILE_SIZE" value="50000000"><br> <!-- Maximal 50 Megabyte -->
			<label class="uploadLabel" for="xml">GPX-Datei</label>
			<input class="uploadInput" type="file" name="xml" id="xml" placeholder="Aktivität"><br>
		</div>
		<input class="uploadInput" type="submit" name="upload" value="hochladen"><br><br>
	</form>
</div>
<?php
  include 'footer.php';
?>
