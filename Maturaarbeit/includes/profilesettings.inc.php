<form class="settings" action="includes/settings.inc.php" method="post" enctype="multipart/form-data">
  <div class="settingsBlock">
    <label class="settingsLabel" for="username">Benutzername</label>
    <input type="text" id="username" name="username" placeholder="Benutzername" value="<?php echo $username; ?>"><br>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="email">E-Mail</label>
    <input type="email" id="email" name="email" placeholder="E-Mail" value="<?php echo $email; ?>"><br>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="first">Vorname</label>
    <input type="text" name="first" id="first" placeholder="Vorname" value="<?php echo $first; ?>"><br>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="last">Nachname</label>
    <input type="text" name="last" id="last" placeholder="Nachname" value="<?php echo $last; ?>"><br>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="gender">Geschlecht</label>
    <select id="gender" name="gender">
      <option selected="selected" value="<?php echo $gender; ?>">Bitte wählen</option>
      <option value="male">männlich</option>
      <option value="female">weiblich</option>
    </select>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="safe"></label>
    <input type="submit" id="safe" name="safe" value="speichern"><br><br>
  </div>
  <a class="delete settings" href="includes/delete.inc.php">Account löschen</a>
</form>