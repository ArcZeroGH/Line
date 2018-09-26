<?php
class Hash {
  /* ---------------------------------------------------------------------------------------------------- */
  // Create a hash
  public static function make($string, $salt = ''){
    return hash('sha256', $string . $salt);
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Create a salt - rubbish characters
  public static function salt($length){
    return mcrypt_create_iv($length);
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Create a unique hash
  public static function unique(){
    return self::make(uniqid());
  }
} // End class 'Hash'