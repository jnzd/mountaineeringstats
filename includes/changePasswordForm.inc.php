<form class="settings" action="includes/changePassword.inc.php" method="post" enctype="multipart/form-data">
  <div class="settingsBlock">
    <label class="settingsLabel" for="oldpassword">Altes Passwort</label>
    <input class="settingsInput" type="password" id="oldpassword" name="oldpassword" placeholder="Altes Passwort"><br>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="newpassword">Neues Passwort</label>
    <input class="settingsInput" type="password" id="newpassword" name="newpassword" placeholder="Neues Passwort"><br>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="confirmpassword">Neues Passwort bestätigen</label>
    <input class="settingsInput" type="password" id="confirmpassword" name="confirmpassword" placeholder="Bestätige neues Passwort"><br>
  </div>
  <div class="settingsBlock">
    <label class="settingsLabel" for="safe"></label>
    <input type="submit" id="safe" name="safe" value="speichern"><br><br>
  </div>
  <a class="settings" onclick="passwordreset()" href="#">Passwort vergessen</a>
</form>
<script src="javascript/passwordreset.js"></script>