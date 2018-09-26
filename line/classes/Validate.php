<?php
class Validate {
  private $_passed = false,
          $_errors = array(),
          $_db = null;

  public function __construct(){
    try {
      $this->_db = DB::getInstance();
    } catch (PDOException $e) {
      die($e->getMessage()) ;
    }
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Check send items
  public function check($source, $items = array()){
    foreach($items as $item => $rules){
      foreach($rules as $rule => $rule_value){
        $value = trim($source[$item]);
        $item = escape($item);

        if($rule === 'required' && empty($value)){
          $this->addError("{$item} is required!");
        } else if(!empty($value)){
          switch($rule){
            case 'min':
              if(strlen($value) < $rule_value){
                $this->addError("{$item} must be a minimum of {$rule_value} characters");
              }
            break;

            case 'max':
              if(strlen($value) > $rule_value){
                $this->addError("{$item} must be a maximum of {$rule_value} characters");
              }
            break;

            case 'matches':
              if($value != $source[$rule_value]){
                $this->addError("{$rule_value} must match {$item}");
              }
            break;
            case 'unique':
              $check = $this->_db->get($rule_value, array($item, '=', $value));
              
              if($check->count()){
                $this->addError("{$item} already exists");
              }
            break;
          }
        }
      }
    }

    if(empty($this->_errors)){
      $this->_passed = true;
    }

    return $this;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // AddError handler private
  private function addError($error){
    $this->_errors[] = $error;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Error
  public function errors(){
    return $this->_errors;
  }

  public function passed(){
    return $this->_passed;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Print_r display
  public static function prePrintErr($source){
    echo "<div id='preprint'><pre>";
    print_r($source->errors());
    echo "</pre></div>";
  }
  public static function prePrintAll($source){
    echo "<div id='preprint'><pre>";
    print_r($source);
    echo "</pre></div>";
  }
} // End class 'Validate'