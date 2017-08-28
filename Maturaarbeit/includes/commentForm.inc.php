<div id='comment'>
  <form id="settings" action="includes/settings.inc.php" method="post" enctype="multipart/form-data">
    <input type="text" name="comment" placeholder="Kommentar hinzufügen"><br>
    <input type="hidden" name="" value=""><br> 
    <input type="submit" name="send" placeholder="kommentieren" onclick="comment()"><br><br>
  </form>
</div>
<?php
  
?>
<script>
    function comment() {
      $.ajax({
        type:'post',
        url:'includes/comment.inc.php',
        datatype: 'json',
        data: {
          userID: '<?php echo $userID; ?>',
          actID: '<?php echo $actID; ?>',
          text: '<?php echo $userID; ?>'
        }
      });
      return false;
    }
  </script>