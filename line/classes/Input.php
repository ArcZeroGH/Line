<?php
class Input {
  /* ---------------------------------------------------------------------------------------------------- */
  // Set GET/POST existency
  public static function exists($method = 'post'){
    switch($method){
      case 'post':
        return(!empty($_POST)) ? true : false;
      break;

      case 'get':
        return(!empty($_GET)) ? true : false;
      break;

      default:
        return false;
      break;
    }
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Get an item with POST/GET
  public static function get($item){
    if(isset($_POST[$item])){
      return $_POST[$item];
    } else if(isset($_GET[$item])) {
      return $_GET[$item];
    }
    return '';
  }
} // End class 'Input'