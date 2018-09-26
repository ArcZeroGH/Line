<?php
class Post {
  private $_db,
          $_data;
  
  public function __construct(){
    $this->_db = DB::getInstance();
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Store data found in private _data
  public function data(){
    return $this->_data;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Find a post
  public function find($item){
    $data = $this->_db->get('posts', array('id', '=', $item));

    if($data->count()){
      $this->_data = $data->results();
      // echo $this->data()->content;
    } else {
      Session::flash('returnMsg', 'Oops something went wrong!');
      Redirect::to('admin.php');
    }
    return false;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Get a single post from a creator
  public function post($id = null){
    $data = $this->_db->get('posts', array('user_id', '=', $id));
    // Session::prePrint($data->results(), 'classes/Post.php');
    $this->_data = $data->results();
    if($data->count()){
      $this->_data = $data->results();
      // Session::prePrint($this->_data, 'classes/Post.php');

      foreach($this->_data as $key){
        $date = date_create($key->created);
        $p_sql = $this->_db->get('users', array('id', '=', $key->user_id));
        $p_creator = $p_sql->first();

        echo "<div id='post_".$key->id."' class='post'>";

        echo   "<div class='user'>";
        echo      "<div class='p_user_img'><img src='images/prof1.jpg' alt='img_name' draggable='false'></div>";
        echo      "<div class='p_user_info'>";
        echo        "<span class='p_name'>".$p_creator->fullname."</span>";
        echo        "<span class='p_created'>".date_format($date, 'M d Y - H:i:s')."</span>";
        echo      "</div>";
        echo      "<div class='post_ctrl'>";
        echo        "<button id='postCtrl_".$key->id."' class='postbtn'><i class='fa fa-ellipsis-h'></i></button>";
        echo        "<div id='postCtrl_".$key->id."_panel' class='post_dropdown_ctrl'>";
        echo          "<a id='delete_".$key->id."' href='delete_post.php?p=".$key->id."' class='delete'>Delete</a>";
        echo          "<span>Edit</span>";
        echo          "<span id='hide_".$key->id."' class='hide_post'>Hide</span>";
        echo        "</div>";
        echo      "</div>";
        echo   "</div>";

        echo   "<p>".$key->content."</p>";
        // echo   "<img src='images/city_buildings.jpg' alt='imgblap'>";

        echo "</div>";
      }
      return true;
      
    } else {
      echo "<div class='post'>You have not created a post yet <a href='#'>create new post</a></div>";
    }
    return false;
  }

  /* ---------------------------------------------------------------------------------------------------- */
  // Register a user
  public function delete($fields = array()){
    if(!$this->_db->delete('posts', $fields)){
      throw new Exception('There was a problem deleting a post!');
    }
  }

} // End class 'Post'