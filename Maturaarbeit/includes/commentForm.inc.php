<div id="commentForm<?php echo $actid; ?>" class="commentForm">
  <textarea class="commentBox" id="comment<?php echo $actid; ?>" placeholder="Kommentar schreiben" rows="1"></textarea>
  <button type="button" onclick="postComment(<?php echo $actid; ?>)">Kommentieren</button>
</div>
