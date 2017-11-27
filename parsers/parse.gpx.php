<?php
  if(isset($urlInclude)){
    include '../vendor/autoload.php';
  }else{
    include 'vendor/autoload.php';
  }
  use phpGPX\phpGPX;
  //include '../vendor/autoload.php';
  function bigger_than($testValue){
    if($testValue > 60){
      return false;
    }else{
      return true;
    }
  }
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
    $distanceTotal = 0;
    $averageSpeed = 0;
    $duration = 0;
    foreach ($file->tracks as $track){
      $segment = $track->segments;
        foreach ($segment as $segment) {
        $points = $segment->points;
        //fill data arrays
        foreach ($points as $points) {
          array_push($latitude, $points->latitude);
          array_push($longitude, $points->longitude);
          array_push($elevation, $points->elevation);
          if(isset($points->time)){
            array_push($dateTime, $points->time);
          }else{
            return false;
          }
          array_push($difference, $points->difference);
        }
        $lat_js = json_encode($latitude);
        $long_js = json_encode($longitude);
        $elevation_js = json_encode($elevation);
        $distance_js = json_encode($distance);
        $stats = $segment->stats;
        $averageSpeed = floor(($stats->averageSpeed*3.6)*100)/100;
        $averageSpeed .= " km/h";
        $distanceTotal = floor(($stats->distance/1000)*100)/100;
        $distanceTotal .= " km";
        $duration = $stats->duration;
      }
    }
    if($duration>60){
      $seconds = $duration%60;
      $minutes = ($duration-$seconds)/60;
      $duration = $minutes.":".$seconds." min";
      if($minutes>60){
        $minutesRemainder = $minutes%60;
        if($minutesRemainder<10){
          $minutesRemainder = "0".$minutesRemainder;
        }
        $hours = ($minutes-$minutesRemainder)/60;
        $minutes = $minutes%60;
        $duration = $hours.":".$minutesRemainder." h";
      }
    }
    $length = count($difference);
    $i = 1;
    $speed = [];
    if(!is_int($dateTime[0])){
      while($i<$length){
        $a = $dateTime[$i]->getTimestamp();
        $b = $dateTime[$i-1]->getTimestamp();
        if($a!=$b){
          $timeInterval = $a - $b;
        }
        $speedkmh = ($difference[$i]/$timeInterval)*3.6;
        array_push($speed, $speedkmh);
        $i++;
      }
      $speedCleared = array_filter($speed, "bigger_than");
      $speed_js = json_encode($speed);
      foreach($dateTime as $moment){
        $date = $moment->format('Y-m-d H:i:s');
        array_push($time, $date);
      }
    }else{
      while($i<$length){
        $dateTime[$i] = false;
        $i++;
      }
    }
    $time_js = json_encode($time);
    $values=array("latitude"=>$lat_js,"longitude"=>$long_js,"elevation"=>$elevation_js,"distance"=>$distance_js,"time"=>$time_js,"latitudePHP"=>$latitude,"longitudePHP"=>$longitude,"dateTime"=>$dateTime,"distancePHP"=>$distance,"speed"=>$speed_js, "distanceTotal"=>$distanceTotal, "averageSpeed"=>$averageSpeed, "duration"=>$duration);
    return $values;
  }
?>
