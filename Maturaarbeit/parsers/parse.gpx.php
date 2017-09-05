<?php
  include 'vendor/autoload.php';
  use phpGPX\phpGPX;
  //include '../vendor/autoload.php';
  function gpx($location){
    $gpx = new phpGPX();
    $file = $gpx->load($location);
     //define empty arrays
    $latitude = [];//imprtant
    $longitude = [];//imprtant
    $elevation = [];//important
    $dateTime = [];//important
    $time = [];
    $difference = [];//maybe important
    $distance = [];//important

    foreach ($file->tracks as $track){
      $segment = $track->segments;
        foreach ($segment as $segment) {
        $points = $segment->points;
        //fill data arrays
        foreach ($points as $points) {
          array_push($latitude, $points->latitude);
          array_push($longitude, $points->longitude);
          array_push($elevation, $points->elevation);
          array_push($dateTime, $points->time);
          array_push($difference, $points->difference);
        }
        $lat_js = json_encode($latitude);
        $long_js = json_encode($longitude);
        $elevation_js = json_encode($elevation);
        $distance_js = json_encode($distance);
      }
    }

    $length = count($difference);
    $i = 1;
    $speed = [];
    while($i<$length){
      $timeInterval = $dateTime[$i]->diff($dateTime[$i-1]);
      $timeIntervalSec = $timeInterval->format("%s");
      $speedkmh = ($difference[$i]/$timeIntervalSec)*3.6;
      array_push($speed, $speedkmh);
      $i++;
    }
    $speedSorted = asort($speed);
    $median = $speedSorted[count($speedSorted)/2];
    $speedCleared = array_filter($speed, $speed.">".$median*5);
    $speed_js = json_encode($speed);
    foreach($dateTime as $moment){
      $date = $moment->format('Y-m-d H:i:s');
      array_push($time, $date);
    }
    $time_js = json_encode($time);
    $values=array("latitude"=>$lat_js,"longitude"=>$long_js,"elevation"=>$elevation_js,"distance"=>$distance_js,"time"=>$time_js,"latitudePHP"=>$latitude,"longitudePHP"=>$longitude,"dateTime"=>$dateTime,"distancePHP"=>$distance,"speed"=>$speed_js);
    //print_r($values);
    return $values;
  }
?>

