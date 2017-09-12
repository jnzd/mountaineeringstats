<?  
  $latitude = $values['latitudePHP'];
  $longitude = $values['longitudePHP'];
  $track = [];
  $i = 0;
  foreach($latitude as $lat){
    array_push($track, array($lat,$longitude[$i]));
    $i++;
  }
  $encodedCoords = Polyline::encode($track);
  $latCenter = (max($latitude)+min($latitude))/2;
  $longCenter = (max($longitude)+min($longitude))/2;
  $link = "https://maps.googleapis.com/maps/api/staticmap?size=900x400&center=".$latCenter.",".$longCenter."&zoom=14&path=weight:3%7Ccolor:blue%7Cenc:".$encodedCoords."&key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s";
  $track = [];
  //8192 == oficial character limit for static map urls. https://developers.google.com/maps/documentation/static-maps/intro
  while(strlen($link)>8192){
    $track = [];
    $link = "";
    for($i=0; $i < count($latitude); $i+=4) {
      array_push($track, array($latitude[$i],$longitude[$i]));
    }
    $encodedCoords = Polyline::encode($track);
    $link = "https://maps.googleapis.com/maps/api/staticmap?size=850x400&center=".$latCenter.",".$longCenter."&path=weight:3%7Ccolor:blue%7Cenc:".$encodedCoords."&key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s";
  }
  echo "<img src='".$link."'><br>";
  $link = "";
?>