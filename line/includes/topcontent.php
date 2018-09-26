
<?php
require_once 'core/init.php';
Session::printSession($_FILES, 'includes/topcontent.php');
// Check is user is logged in
$user = new User();
if(!$user->isLoggedIn()){
  Redirect::to('index.php');
}

// Display action messages
if(Session::exists('returnMsg')) {
  echo Session::flash('returnMsg');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<header id="lineHeader">
  <nav id="mainNav">
    <a href="admin.php" id="logo"><img src="images/logo_black.svg" alt="" draggable="false"></a>
    <div id="pageTitle"><?php echo (isset($pagetitle) ? $pagetitle : 'PAGE TITLE'); ?></div>
    <div id="search"><input type="text" name="searchLine" maxlength="48" placeholder="Search..."></div>
    <div id="profile">
      <div id="prof_img"><img src="images/prof1.jpg" alt="profile_user" draggable="false"></div>
      <div id="prof_detail">
        <div id="prof_name" title="<?php echo escape($user->data()->fullname); ?>"><?php echo escape($user->data()->fullname); ?></div>
        <div id="prof_prefix" title="<?php echo escape($user->data()->quote); ?>"><?php echo escape($user->data()->quote); ?></div>
      </div>
      <div id="profileAction">
        <button id="openDrop"><i class="fa fa-caret-down"></i></button>
        <div class="pa_dropdown">
          <a href="editprofile.php" class="pa_action">Edit profile</a>
          <a href="changepassword.php" class="pa_action">Change password</a>
          <a href="profile.php?user=<?php echo escape($user->data()->id); ?>" class="pa_action">Show your profile</a>
          <span class="pa_action">Messages</span>
          <span class="pa_action">Groups</span>
          <a href="logout.php" class="pa_action">Log out</a>
          <?php
            if($user->hasPermission('admin')){
              echo "<a href='#' class='pa_action'>Administrator</a>";
            }
            if($user->hasPermission('moderator')){
              echo "<a href='#' class='pa_action'>Moderator</a>";
            }
          ?>
        </div>
      </div>
    </div>
    <div class="nav_button"><i class="fa fa-comments"></i></div>
    <div class="nav_button"><i class="fa fa-users"></i></div>
    <div class="nav_button"><i class="fa fa-bell"></i></div>
  </nav>
</header>
<main id="lineMain">
<div id="mainContainer">