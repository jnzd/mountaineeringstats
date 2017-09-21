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
      $('#likeButton'+actid).html("<button type='button' onclick='unlike("+actid+")'>Gefällt mir nicht mehr</button>");
    }
  });
  return false;
}