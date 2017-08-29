<div id="comment">
  <form id="commentForm" action="includes/comment.inc.php" method="post" enctype="multipart/form-data">
    <input type="text" id="commentText" name="commentText" placeholder="Kommentar hinzufügen"><br>
  </form>
</div>
<?php
  
?>
<script type='text/javascript'>
  /* attach a submit handler to the form */
  $("#commentForm").submit(function(event) {

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
    var posting = $.post( url, { commentText, userID: '<?php echo $userID; ?>', actID: '<?php echo $actid; ?>'} );

    /* Alerts the results */
    posting.done(function( data ) {
      $('#comments').html('<div id="commentLine"><p class="commentName">'+username+': <p class="commentText">'+commentText+'</p></div>');
    });
  });
</script>