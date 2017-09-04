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
  echo "<img src='https://maps.googleapis.com/maps/api/staticmap?size=400x400&center=".$latCenter.",".$longCenter."&zoom=14&path=weight:3%7Ccolor:blue%7Cenc:".$encodedCoords."&key=AIzaSyBh619HIPkaPOW76qYCe5_39VpnJRhWu2s'><br>";
?>