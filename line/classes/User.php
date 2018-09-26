<?php
class User {
  private $_db,
          $_data,
          $_sessionName,
          $_cookieName,
          $_isLoggedIn;

  public function __construct($user = null){
    $this->_db = DB::getInstance();
    $this->_sessionName = Config::get('session/session_name');
    $this->_cookieName = Config::get('remember/cookie_name');

    // If the user already logged in
    if(!$user){
      if(Session::exists($this->_sessionName)){
        $user = Session::get($this->_sessionName);

        if($this->find($user)){
          $this->_isLoggedIn = true;
        } else {
          // log out;
        }
      }
    } else {
      $this->find($user);
    }
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Find a user either number or by email
  public function find($user = null){
    if($user){
      $field = (is_numeric($user)) ? 'id' : 'email';
      $data = $this->_db->get('users', array($field, '=', $user));

      if($data->count()){
        $this->_data = $data->first();
        return true;
      }
    }
    return false;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Get all users
  public function getAllUsers(){
    $data = $this->_db->get('users','');
  }

  public function exists(){
    return (!empty($this->_data)) ? true : false;
  }
  /* ---------------------------------------------------------------------------------------------------- */
  // If user is already loggged in
  public function isLoggedIn(){
    return $this->_isLoggedIn;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // User data
  public function data(){
    return $this->_data;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Register a user
  public function create($fields = array()){
    if(!$this->_db->insert('users', $fields)){
      throw new Exception('There was a problem creating an account!');
    }
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Log in a user
  public function login($email = null, $password = null, $remember){
    $user = $this->find($email);
    // print_r($this->_data);

    if($email){
      if($this->data()->password === Hash::make($password, $this->data()->salt)) {
        Session::put($this->_sessionName, $this->data()->id);

        // Set remember me function
        if($remember){
          $hash = Hash::unique();
          $hashCheck = $this->_db->get('user_sessions', array('user_id', '=', $this->data()->id));

          if(!$hashCheck->count()){
            $this->_db->insert('user_sessions', array(
              'user_id' => $this->data()->id,
              'hash' => $hash
            ));
          } else {
            $hash = $hashCheck->first()->hash;
          }

          // Store a cookie
          Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiration'));
        }

        Redirect::to('admin.php');
        return true;
      }
    }
    return false;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Update a user
  public function update($fields = array(), $id = null){

    //default current user as $id
    if(!$id && $this->isLoggedIn()){
      $id = $this->data()->id;
    }

    if(!$this->_db->update('users', $id, $fields)){
      throw new Exception('There was a problem updating your profile!');
    }
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Log out a user
  public function logout(){
    Session::destroy();
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // User persimissions
  public function hasPermission($key){
    $role = $this->_db->get('roles', array('id', '=', $this->data()->role_id));
    // print_r($role->first());

    if($role->count()){
      $permissions = json_decode($role->first()->permissions, true);

      if($permissions[$key] == true){
        return true;
      }
    }
    return false;
  }

} // End class 'User'