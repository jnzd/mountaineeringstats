<?php
	class ImageFactory{
    public  function MakeThumb($thumb_target = '', $width = 300,$height = 300,$SetFileName = false, $quality = 80){
      function imagecreatefromfile( $filename ) {
        if (!file_exists($filename)) {
            throw new InvalidArgumentException('File "'.$filename.'" not found.');
        }
        switch(strtolower(pathinfo($filename,PATHINFO_EXTENSION))){
          case 'jpeg':
          case 'jpg':
              return imagecreatefromjpeg($filename);
          break;
          case 'png':
              return imagecreatefrompng($filename);
          break;
          case 'gif':
              return imagecreatefromgif($filename);
          break;
          default:
              throw new InvalidArgumentException('File "'.$filename.'" is not valid jpg, png or gif image.');
          break;
        }
      }
      $thumb_img = imagecreatefromfile($thumb_target);
      // size from
      list($w, $h) = getimagesize($thumb_target);
      if($w > $h) {
        $new_height = $height;
        $new_width = floor($w * ($new_height / $h));
        $crop_x = ceil(($w - $h) / 2);
        $crop_y = 0;
      }else {
        $new_width = $width;
        $new_height = floor( $h * ( $new_width / $w ));
        $crop_x = 0;
        $crop_y = ceil(($h - $w) / 2);
      }
      // I think this is where you are mainly going wrong
      $tmp_img = imagecreatetruecolor($width,$height);
      imagecopyresampled($tmp_img, $thumb_img, 0, 0, $crop_x, $crop_y, $new_width, $new_height, $w, $h);
      if($SetFileName == false) {
        header('Content-Type: image/jpeg');
        imagejpeg($tmp_img);
      }else{
        imagejpeg($tmp_img,$SetFileName,$quality);
      }
      imagedestroy($tmp_img);
    }
  }
?>