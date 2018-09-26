<?php
require_once 'core/init.php';
// Session::prePrint($_SESSION, '/delete_post.php');

$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('index.php');
}

if(Input::get('p') && Input::get('p') != ''){
  $p_id = Input::get('p');

  $post = new Post();
  $findpost = $post->find($p_id);
  $post_user = $post->data()->user_id;
  $currUser = $user->data()->id;

  if($post_user == $currUser) {
    try{
      $post->delete(array('id','=',$p_id));
  
      Session::flash('returnMsg', 'Your post has been deleted');
      Redirect::to('admin.php');
    } catch(Exception $e) {
      die($e->getMessage());
      Redirect::to(404);
    }
  }
} else {
  Session::flash('returnMsg', 'Oops something went wrong!');
  Redirect::to('admin.php');
}