<?php
class DB {
  // Set _instance default value
  private static $_instance = null;

  private $_pdo,
          $_query,
          $_results,
          $_error = false,
          $_count = 0;

  // Construct Database
  private function __construct(){
    try {
      $db_host = Config::get('mysql/host');
      $db_name = Config::get('mysql/db');
      $db_user = Config::get('mysql/username');
      $db_pass = Config::get('mysql/password');

      $this->_pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $db_user, $db_pass);
      // echo 'Connected';
    } catch (PDOException $e){
      die($e->getMessage());
    }
  }

  // Check if Database already instanciated and prevent multiple connection open
  public static function getInstance(){
    if(!isset(self::$_instance)) {
      self::$_instance = new DB();
    }
     return self::$_instance;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Query statement
  public function query($sql, $params = array()){
    $this->_error = false;

    if($this->_query = $this->_pdo->prepare($sql)){
      $x = 1;

      // Check if there're parameters and bind ?
      if(count($params)){
        foreach($params as $param){
          $this->_query->bindValue($x, $param);
          $x++;
        }
      }

      // Execute the query
      try {
        if($this->_query->execute()){
          $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
          $this->_count = $this->_query->rowCount();
        } else {
          $this->_error = true;
        }
      } catch (PDOException $e){
        die($e->getMessage());
      }
      
    }
    return $this;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Action statement
  public function action($action, $table, $where = array()){
    // Third parameter should be array
    if(count($where) === 3){
      $operators = array('=', '<', '>', '<=', '>=', '!=');
      $field     = $where[0]; 
      $operator  = $where[1];
      $value     = $where[2];

      // Bind and execute query
      if(in_array($operator, $operators)){
        $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
        // print_r($sql);
        if(!$this->query($sql, array($value))->error()){
          return $this;
        }
      }
    }
    return false;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Get from database
  public function get($table, $where){
    return $this->action('SELECT * ', $table, $where);
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Delete from database
  public function delete($table, $where){
    return $this->action('DELETE ', $table, $where);
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Insert into database 
  public function insert($table, $fields = array()){
    $keys = array_keys($fields);
    $values = '';
    $x = 1;

    foreach($fields as $field){
      $values .= '?';
      if($x < count($fields)) {
        $values .= ', ';
      }
      $x++;
    } // die($values);

    $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys)  . "`) VALUES ({$values})";
    // echo $sql;

    if(!$this->query($sql, $fields)->error()){
      return true;
    }
    return false;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Update database
  public function update($table, $target, $fields){
    $set = '';
    $x = 1;

    foreach($fields as $name => $value){
      $set .= "{$name} = ?";
      if($x < count($fields)) {
        $set .= ', ';
      }
      $x++;
    } // die($set);

    $sql = "UPDATE {$table} SET {$set} WHERE id = {$target}";
    // echo $sql;

    if(!$this->query($sql, $fields)->error()){
      return true;
    }
    return false;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Results
  public function results(){
    return $this->_results;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Get first result
  public function first(){
    return $this->results()[0];
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Error
  public function error(){
    return $this->_error;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Count
  public function count(){
    return $this->_count;
  }

} // Class end 'DB'