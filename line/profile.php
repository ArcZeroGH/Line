<?php
$pagetitle = "Profile";
require_once 'includes/topcontent.php';
?>
<div id="pageContent">
  <div class="crow">
  <?php
    if(!$getUser = Input::get('user')){
      Redirect::to('admin.php');
    } else {
      $newUser = new User($getUser);
      if(!$newUser->exists()){
        Redirect::to(404);
      } else {
        $data = $newUser->data();
      }
    }
  ?>
  <div id="showProfile" class="row">
    <div id="showProfImg">
      <img src="images/prof1.jpg" alt="">
    </div>
    <a href="#" class="add_friend"><i class="fa fa-plus"></i> Add friend</a>
  </div>
  <div class="row">
    <div class="show_profinfo">
      <div class="show_proftitles">
        <h1><?php echo escape($data->fullname); ?></h1>
        <div class="row"><p><?php echo escape($data->quote); ?></p></div>
      </div>
      <div class="row"><h3>About me</h3></div>
      <div class="row"><p><?php echo escape($data->about_me); ?></p></div>
      <div class="row"><p><?php echo escape($data->email); ?></p></div>
      <div class="row">
        <?php
          if($user->data()->id == $newUser->data()->id) {
            echo '<a href="editprofile.php"><i class="fa fa-pencil"></i> Edit profile</a>';
          }
        ?>
      </div>
    </div>
    <div class="show_profstats">
      <div class="row"><p>Records</p></div>
      <div class="row">
        <?php
        
        ?>
        <div class="show_profpost">What an amazing day! I love being a doctor.</div>
        <div class="show_profpost">My decision to move from London to NY paid off.</div>
        <div class="show_profpost">You're almost done, allow yourself to get some more time in weekends friends.</div>
      </div>
    </div>
  </div>
  </div>
</div> <!-- pageContent end -->
<?php require_once 'includes/botcontent.php' ?>