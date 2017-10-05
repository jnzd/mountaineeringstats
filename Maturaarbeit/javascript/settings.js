function changeSettings(url){
  $.ajax({
    type:'post',
    url: 'includes/'+url+'.inc.php',
    datatype: 'json',
    success: function(data){
      $('#settingsAside').html(data);
    }
  });
}