<div id="commentForm">
  <form id="commentForm" action="includes/comment.inc.php" method="post" enctype="multipart/form-data">
    <input type="text" id="commentText" name="commentText" placeholder="Kommentar hinzufügen" autocomplete="off"><br>
    <input type="hidden" id="actID" name="actID" value="<?php echo $actid;?>">
  </form>
</div>

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
    var actID = $('#actID').val();
    var username = "<?php 
       $sql = "SELECT * FROM users WHERE id='$userID'";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
       echo $row['username'];
    ?>";
    var posting = $.post( url, { commentText, userID: '<?php echo $_SESSION['id']; ?>', actID} );
    
    /* Alerts the results */
    var divID = '#comments'+actID;
    posting.done(function( data ) {
      $(divID).append('<div id="commentLine"><p class="comment"><b>'+username+' </b>'+commentText+'</p></div>');
    });
  });
</script>