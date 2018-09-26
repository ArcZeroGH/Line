<?php
class Session {
  /* ---------------------------------------------------------------------------------------------------- */
  // Check if session exists
  public static function exists($name){
    return (isset($_SESSION[$name])) ? true : false;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Get a session
  public static function get($name){
    return $_SESSION[$name];
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Set a session
  public static function put($name, $value){
    return $_SESSION[$name] = $value;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Delete a session
  public static function delete($name){
    if(self::exists($name)) {
      unset($_SESSION[$name]);
    }
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Delete a session
  public static function destroy(){
    session_destroy();
    Redirect::to('index.php');
  }

  public static function flash($name, $string = ''){
    if(self::exists($name)){
      $session = self::get($name);
      self::delete($name);
      return "<div id='actionMsg'>" . $session . "</div>";
    } else {
      self::put($name, $string);
    }
    return '';
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Show all session
  public static function printSession($source, $where = null){
    echo "<div id='userInfo'><b>Print_r : ".$where."</b><pre>";
    print_r($source);
    echo "</pre></div>";
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Normal Print_r
  public static function prePrint($source, $where = null){
    echo "<div id='prePrint'><b>Print_r : ".$where."</b><pre>";
    print_r($source);
    echo "</pre></div>";
  }
} // End class 'Session'