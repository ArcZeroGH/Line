<?php
$pagetitle = "Edit profile";
require_once 'includes/topcontent.php';

if(Input::exists()){
  if(Token::check(Input::get('token'))){
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      'username' => array('required'=>true,'min'=>3,'max'=>32),
      'fullname' => array('required'=>true,'min'=>3,'max'=>32),
      'email' => array('required'=>true,'min'=>3,'max'=>128),
      'about_me' => array('required'=>true,'min'=>3,'max'=>512),
      'quote' => array('required'=>true,'min'=>3,'max'=>32)
    ));

    if($validation->passed()) {
      try {
        $user->update(array(
          'username' => Input::get('username'),
          'fullname' => Input::get('fullname'),
          'email' => Input::get('email'),
          'about_me' => Input::get('about_me'),
          'quote' => Input::get('quote')
        ));

        Session::flash('returnMsg', 'Your profile has been updated successfully');
        Redirect::to('editprofile.php');
      } catch(Exception $e) {
        die($e->getMessage());
      }
    } else {
      foreach($validation->errors() as $err){
        echo $err . '<br>';
      }
    }
  }
}
// print_r($user->data());
?>
<div id="pageContent">
  <div class="crow">
    <div class="row"><h2 class="text_center">Edit profile</h2></div>
    <div class="row edit_form">
      <div class="row"><a href="admin.php"><i class="fa fa-long-arrow-left"></i> Back to Home</a></div>
      <form id="editProfile" class="form" action="" method="post">
        <div class="row">
          <label for="username">Username <span class="tooltip" data-tooltip="Your profile username. This is what people can see/search before you are friends with them.">?</span></label>
          <input id="username" name="username" class="input_field" type="text" value="<?php echo $user->data()->username; ?>">
        </div>
        <div class="row">
          <label for="fullname">Full name <span class="tooltip" data-tooltip="Your full name can only be seen by your friends.">?</span></label>
          <input id="fullname" name="fullname" class="input_field" type="text" value="<?php echo $user->data()->fullname; ?>">
        </div>
        <div class="row">
          <label for="email">E-mail</label>
          <input id="email" name="email" class="input_field" type="email" value="<?php echo $user->data()->email; ?>">
        </div>
        <div class="row">
          <label for="about_me">About me <span class="tooltip" data-tooltip="Do tell about yourself">?</span></label>
          <textarea id="about_me" name="about_me"><?php echo $user->data()->about_me; ?></textarea>
        </div>
        <div class="row indent_row">
          <div class="row">
            <label for="quote">Favourite quote <span class="tooltip" data-tooltip="The quote under your profile name">?</span></label>
            <input id="quote" name="quote" class="input_field" type="text" value="<?php echo $user->data()->quote; ?>">
          </div>
          <a href="changepassword.php" title="change your password">Change password</a>
        </div>
        <div class="row"><button type="submit" class="submit_btn">Save</button></div>
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
      </form>
    </div>
  </div>

</div>
<?php require_once 'includes/botcontent.php'; ?>