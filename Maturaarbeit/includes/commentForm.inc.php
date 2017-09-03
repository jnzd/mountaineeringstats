<div id="commentForm<?php //echo $actid; ?>">
  <form id="commentForm" action="includes/comment.inc.php" method="post" enctype="multipart/form-data">
    <input type="text" id="commentText" name="commentText" placeholder="Kommentar hinzufügen" autocomplete="off"><br>
    <input type="hidden" id="actID" name="actID" value="<?php echo $actid;?>">
  </form>
</div>

<script type='text/javascript'>
  /* attach a submit handler to the form */
  var actID = "<?php echo $actid; ?>";
  console.log("#commentForm"/*+actID*/);
  $("#commentForm"+actID).submit(function(event) {
    /* stop form from submitting normally */
    event.preventDefault();
    /* get the action attribute from the <form action=""> element */
    var $form = $( this ),
        url = $form.attr( 'action' );
    /* Send the data using post with element id name and name2*/
    var commentText = $('#commentText').val();
    var username = "<?php 
       $sql = "SELECT * FROM users WHERE id='$userID'";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
       echo $row['username'];
    ?>";
    var posting = $.post( url, { commentText: $('#commentText').val(), userID: '<?php echo $_SESSION['id']; ?>', actID: $('#actID').val()} );
    /* displays the comment*/
    posting.done(function( data ) {
      $('#comments'+$('#actID').val()).append('<div id="commentLine"><p class="comment"><b>'+username+' </b>'+commentText+'</p></div>');
    });
  });
</script>