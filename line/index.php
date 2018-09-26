<?php
  require_once 'core/init.php';
  Session::printSession($_SESSION);

  if(Session::exists('returnMsg')) {
    echo Session::flash('returnMsg');
  }

  $user = new User();
  if($user->isLoggedIn()) {
    // echo $user->data()->username;
    Redirect::to('admin.php');
  }

  // Login input
  if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
      $validate = new Validate();
      $validation = $validate->check($_POST, array(
        'email' => array('required'=>true),
        'password' => array('required'=>true)
      ));

      if($validation->passed()) {
        $user = new User();
        $remember = (Input::get('remember') === 'on') ? true : false;
        $login = $user->login(Input::get('email'), Input::get('password'), $remember);

        if($login){
          Session::flash('returnMsg', 'Welcome there boi!');
        } else {
          echo 'Login failed';
        }
        
      } else {
        foreach($validation->errors() as $err){
          echo $err . '<br>';
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Line&trade; : Timeline</title>
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
<main id="aceApp">
  <section id="leftInfo">
    <img src="images/logo_line_white.svg" alt="Line : Start with a line" style="width:50%;" draggable="false">
    <h1 class="h1_form">Welcome to line&trade;</h1>
    <p class="line_p">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
  </section>
  <section id="rightInfo">
    <!-- ***** Login form ***** -->
    <div id="login" class="flip_front">
    <div class="row"><h2 class="form_header">Log in to your account</h2></div>
    <form id="loginForm" class="form" action="" method="post">
      <div class="row">
        <label for="email">E-mail *</label>
        <input id="email" name="email" class="input_field" type="email">
      </div>
      <div class="row">
        <label for="password">Password *</label>
        <input id="password" name="password" class="input_field" type="password">
      </div>
      <div class="row">
        <label for="remember">
          <input type="checkbox" name="remember" id="remember"> Remember me
        </label>
      </div>
      <div class="row"><button type="submit" class="submit_btn">Log in</button></div>
      <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    </form>
    <div class="row" style="margin-top: 10px;">
      <span>don't have an account?</span>
      <a href="register.php" class="form_switch">sign up</a>
    </div>
    <div class="row">
        <a href="#" class="forgotten_password">forgot password</a>
      </div>
    </div>
  </section>
</main>
<script src="js/jquery_3_2_1_min.js"></script>
<script src="js/script.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
</body>
</html>
<?php
session_destroy();
?>