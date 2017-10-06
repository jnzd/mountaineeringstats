<form class="settings" action="includes/changeProfilePic.inc.php" method="post" enctype="multipart/form-data">
  <div class="settingsBlock">
    <input type="hidden" name="MAX_FILE_SIZE" value="50000000"><br> <!-- Maximal 50 Megabyte -->
    <label class="settingsLabel" for="pic">Profilbild</label>
    <input type="file" id="pic" name="pic" placeholder="Profilbild"><br>
  </div>
  <input type="submit" name="safe" value="speichern"><br><br>
  <a class="settings" href="includes/deletePic.inc.php">Profilbild löschen</a>
</form>