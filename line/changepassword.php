<?php
$pagetitle = "Change password";
require_once 'includes/topcontent.php';

// Change password
if(Input::exists()){
  if(Token::check(Input::get('token'))){
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      // 'password_current' => array('required'=>true,'min'=> 6),
      'password_new' => array('required'=>true,'min'=>6),
      'password_repeat' => array('required'=>true,'min'=>6,'matches'=>'password_new'),
    ));

    if($validation->passed()){
      // Check the current password aswell
      /*if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password){
        echo "Your current password is wrong!";
      } else {
        $salt = Hash::salt(32);
        $user->update(array(
          'password' => Hash::make(Input::get('password_new'), $salt),
          'salt' => $salt
        ));

        Session::flash('returnMsg', 'Your password has been updated');
        Redirect::to('changepassword.php');
      }*/

      // Normal change password without current password needed
      $salt = Hash::salt(32);
      $user->update(array(
        'password' => Hash::make(Input::get('password_new')),
        'salt' => $salt
      ));

      Session::flash('returnMsg', 'Your password has been updated');
      Redirect::to('changepassword.php');
    } else {
      foreach($validation->errors() as $err){
        echo $err . '<br>';
      }
    }
  }
}
?>
<div id="pageContent">
  <div class="crow">
    <div class="row"><h2 class="text_center">Edit password</h2></div>
    <div class="row edit_form">
      <div class="row"><a href="admin.php"><i class="fa fa-long-arrow-left"></i> Back to Home</a></div>
      <form id="editProfile" class="form" action="" method="post">
        <div class="row indent_row" style="display:none;">
          <label for="password_current">Current password <span class="tooltip" data-tooltip="Before you can change your password, you need to enter your current password">?</span></label>
          <input id="password_current" name="password_current" class="input_field" type="password">
        </div>
        <div class="row">
          <label for="password_new">Enter new password <span class="tooltip" data-tooltip="Enter a new password">?</span></label>
          <input id="password_new" name="password_new" class="input_field" type="password">
        </div>
        <div class="row">
          <label for="password_repeat">Repeat new password <span class="tooltip" data-tooltip="Please repeat your new password again">?</span></label>
          <input id="password_repeat" name="password_repeat" class="input_field" type="password">
        </div>
        <div class="row"><button type="submit" class="submit_btn">Change password</button></div>
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
      </form>
    </div>
  </div>
</div>
<?php require_once 'includes/botcontent.php' ?>