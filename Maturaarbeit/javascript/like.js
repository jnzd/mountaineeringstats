function like(actid){
  /**
   * call like.inc
   */
  $.ajax({
    type:'post',
    url:'includes/like.inc.php',
    datatype: 'json',
    data: {
      userid: userid,
      actid: actid
    },
    complete: function(){
      /**
       * switch like button
       */
      $('#likeButton'+actid).html("<button class='unlike' type='button' onclick='unlike("+actid+")'></button>");
    }
  });
  return false;
}