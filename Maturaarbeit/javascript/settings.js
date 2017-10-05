function changeSettings(url, urlUpdate){
  $.ajax({
    type:'post',
    url: 'includes/'+url+'.inc.php',
    datatype: 'json',
    success: function(data){
      $('#settingsAside').html(data);
      window.history.pushState("", "mountaineeringstats", "/settings.php?sub="+urlUpdate);
    }
  });
}