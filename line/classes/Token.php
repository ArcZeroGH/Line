<?php
class Token {
  /* ---------------------------------------------------------------------------------------------------- */
  // Generate a random md5 token
  public static function generate(){
    return Session::put(Config::get('session/token_name'), md5(uniqid()));
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Check token
  public static function check($token){
    $tokenName = Config::get('session/token_name');

    if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
      Session::delete($tokenName);
      return true;
    }

    return false;
  }
} // End class 'Token'