<?php
class Redirect {
  public static function to($location = null){
    if($location){
      // 404 NOT FOUND
      if(is_numeric($location)) {
        switch($location){
          case 404:
            header('HTTP/1.0 404 NOT FOUND');
            include 'includes/errors/404.php';
            exit();
          break;
        }
      }

      // Locate to the destination
      header('Location: ' . $location);
      exit();
    }
  }
} // End class 'Redirect'