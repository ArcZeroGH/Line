<?php
class Config {
  public static function get($path){
    if($path){
      $config = $GLOBALS['config'];
      $path = explode('/', $path);

      foreach($path as $bit){
        if(array_key_exists($bit, $config)){
          $config = $config[$bit];
        } else {
          die('PATH not found' . escape($path));
        }
      }
      return $config;
    }
    return false;
  }
}