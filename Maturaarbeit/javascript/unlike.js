function unlike(actid){
  /**
   * call unlike.inc
   */
  $.ajax({
    type:'post',
    url:'includes/unlike.inc.php',
    datatype: 'json',
    data: {
      userid: userid,
      actid: actid
    },
    complete: function(){
      /**
       * switch like button
       */
      $('#likeButton'+actid).html("<button class='like' type='button' onclick='like("+actid+")'></button>");
    }
  });
  return false;
}