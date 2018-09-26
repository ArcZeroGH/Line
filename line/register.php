<?php
require_once 'core/init.php';
Session::printSession($_SESSION);

// If the input exists at all and check the token
if(Input::exists()){
  if(Token::check(Input::get('token'))){
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      'username' => array('required'=>true,'min'=>3,'max'=>32,'unique'=>'users'),
      'email' => array('required'=>true,'min'=>3,'unique'=>'users'),
      'password' => array('required'=>true,'min'=>6,'max'=>32)
    ));
  
    // When validation passes, create salt and hash for pw and insert to DB
    if($validation->passed()){
      $user = new User();
      $salt = Hash::salt(32);

      try {
        $user->create(array(
          'username' => Input::get('username'),
          'fullname' => Input::get('username'),
          'email' => Input::get('email'),
          'password' => Hash::make(Input::get('password'), $salt),
          'salt' => $salt,
          'quote' => 'My first line',
          'role_id' => '1'
        ));

        Session::flash('returnMsg', 'Youve successfully created a user and can now login');
        Redirect::to('index.php');
      } catch(Exception $e) {
        die($e->getMessage());
        Redirect::to(404);
      }
    } else {
      $errorAll = array();

      foreach($validation->errors() as $error){
        echo $error . '<br>';
        $errorAll[] = "{$error}";
      }
  
      // Validate::prePrintAll($validation);
  
      // $_SESSION['errors'] = $errorAll;
      // echo "<pre>";
      // print_r($_SESSION);
      // print_r($_SESSION['errors'][0]);
      // echo "</pre>";
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
<!-- <header id="header">nav</header> -->
<main id="aceApp">
  <section id="leftInfo">
    <img src="images/logo_white.png" alt="Line : Start with a line" style="width:50%;" draggable="false">
    <h1 class="h1_form">Welcome to line&trade;</h1>
    <p class="line_p">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
  </section>
  <section id="rightInfo">
    <!-- ***** Create user form ***** -->
    <div class="row"><h2 class="form_header">Create a new user</h2></div>
    <form id="createForm" class="form" action="" method="post">
      <div class="row">
        <label for="username">Username *</label>
        <input id="username" name="username" class="input_field" type="text" value="<?php echo Input::get('username'); ?>">
      </div>
      <div class="row">
        <label for="email">E-mail *</label>
        <input id="email" name="email" class="input_field" type="text" value="<?php echo Input::get('email'); ?>">
      </div>
      <div class="row">
        <label for="password">Password *</label>
        <input id="password" name="password" class="input_field" type="password">
      </div>
      <div class="row"><button id="createUser" type="submit" class="submit_btn">Create user</button></div>
      <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    </form>
    <div class="row">
      <span>already registered?</span>
      <a href="/app/line" class="form_switch">login here</a>
    </div>
  </section>
</main>
<script src="js/jquery_3_2_1_min.js"></script>
<script src="js/script.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
</body>
</html>