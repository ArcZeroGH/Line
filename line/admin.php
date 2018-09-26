<?php
$pagetitle = "MY LINE";
require_once 'includes/topcontent.php';
require_once 'includes/getposts.php';
?>
    <section id="profileWall" class="row">
      <img src="images/feather.png" class="feather" alt="" draggable="false">
      <img src="images/feather.png" class="feather2" alt="" draggable="false">
      <img src="images/feather.png" class="feather3" alt="" draggable="false">
      <img src="images/feather.png" class="feather4" alt="" draggable="false">
      <img src="images/feather.png" class="feather5" alt="" draggable="false">
      <h3>SUMMER</h3>
      <h3>JAM MIXTAPE</h3>
      <p>LA PUERTO DE UN SEMANA DE LA MIXTAPE CONTIGO</p>
      <div id="actionCtrl">
        <button id="createPost" class="actionBtn"><i class="fa fa-plus"></i></button>
        <button id="showActivity" class="actionBtn"><i class="fa fa-line-chart"></i></button>
        <button id="getInfo" class="actionBtn"><i class="fa fa-id-card"></i></button>
      </div>
    </section>
    <div id="profileControl">
      <div id="profileCenter">
          <div id="centerImg"><img src="images/prof1.jpg" alt="profile_user" draggable="false"></div>
          <div id="profShow">
            <div id="centerName"><?php echo $user->data()->fullname; ?></div>
            <div id="centerTitle"><?php echo $user->data()->quote; ?></div>
          </div>
      </div>
      <div id="wallLCtrl">
        <button id="home" class="ctrl_button">Home</button>
        <button id="timeline" class="ctrl_button">Timeline</button>
        <button id="friends" class="ctrl_button">Friends</button>
      </div>
      <div id="wallRCtrl">
        <button class="ctrl_button">Photos</button>
        <button class="ctrl_button">Video</button>
        <button class="ctrl_button">...</button>
      </div>
    </div>
    <div id="pageContent">
      <section id="leftPage">
        <section class="crow">
          <div class="row row_title">About</div>
          <p><?php echo escape($user->data()->about_me); ?></p>
          <div class="row row_title">Interests</div>
          <p>Like I said turtoise, juice and some random things I find on dirt.</p>
        </section>
        <section class="crow">
          <div class="row row_title">Other networks</div>
          <div class="row">
            <a href="#" class="crow_btn facebook"><i class="fa fa-facebook"></i> Facebook</a>
            <a href="#" class="crow_btn twitter"><i class="fa fa-twitter"></i> Twitter</a>
            <a href="#" class="crow_btn instagram"><i class="fa fa-instagram"></i> Instagram</a>
          </div>
        </section>
        <section class="crow">
            <div class="row row_title">Badges</div>
            <div class="row">
              <div class="badge"></div>
              <div class="badge"></div>
              <div class="badge"></div>
              <div class="badge"></div>
              <div class="badge"></div>
              <div class="badge"></div>
              <div class="badge"></div>
              <div class="badge"></div>
              <div class="badge"></div>
            </div>
        </section>
      </section>
      <section id="centerPage">
      <?php
        $posts = $post->post($user->data()->id);
      ?>
      <div class="post">
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <input type="file" name="file" id="file">
          <input type="file" name="file2" id="file2">
          <input type="submit" name="submit" id="submit" value="Upload">
        </form>
      </div>
      <div class="post">asdasdasdasd</div>
      <div class="post">asdasdasdasd</div>
      <div class="post">asdasdasdasd</div>
      <div class="post">asdasdasdasd</div>
      <div class="post">asdasdasdasd</div>
      <!--
      <div id="post_100" class="post">
        <div class="user">
          <div class="p_user_img"><img src="images/prof2.jpg" alt=""></div>
          <div class="p_user_info">
            <span class="p_name">Mariah Gazol</span>
            <span class="p_created">Oct 03 2017</span>
          </div>
          <div class="post_ctrl">
            <button id="postCtrl_100" class="postbtn"><i class="fa fa-ellipsis-h"></i></button>
            <div id="postCtrl_100_panel" class="post_dropdown_ctrl">
              <span>Delete</span>
              <span>Edit</span>
              <span id="hide_100" class="hide_post">Hide</span>
            </div>
          </div>
        </div>
        <p>Testung text here</p>
        <img src="images/city_buildings.jpg" alt="">
        <p>Some more text here, I wonder if I will insert some more text in the db</p>
        <div class="subside">
          <div class="comment">
            <div class="c_user"><img src="images/prof1.jpg" alt=""></div>
            <p class="c_content">Jump now!</p>
            <div class="c_created">Oct 04 2017</div>
          </div>
          <div class="comment">
            <div class="c_user"><img src="images/prof2.jpg" alt=""></div>
            <p class="c_content">Jump now!</p>
            <div class="c_created">Oct 04 2017</div>
          </div>
          <div class="comment">
            <div class="c_user"><img src="images/prof3.jpg" alt=""></div>
            <p class="c_content">Jump now!</p>
            <div class="c_created">Oct 04 2017</div>
          </div>
        </div>
        </div>
        -->
        <div class="row"><button class="load_more"><i class="fa fa-refresh"></i></button></div>
      </section>
      <section id="rightPage">
        <section class="crow">hello</section>
        <section class="crow">hello</section>
        <section class="crow">hello</section>
        <section class="crow">hello</section>
      </section>
      <div id="modalWrap">
        <div class="modal_container">
          <h3>Create post</h3>
          <form method="post" action="">
            <input type="text" name="post_content">
            <button name="create_post">Submit</button>
          </form>
          <button class="modal_closer_btn modal_closer"><i class="fa fa-plus"></i></button>
        </div>
        <div class="modal_wrap_closer modal_closer"></div>
      </div>

    </div><!-- pageContent -->
  </div><!--  mainContainer-->
</main>

<div id="scrollToTop"><i class="fa fa-chevron-up"></i> <span>TOP</span></div>
<script src="js/jquery_3_2_1_min.js"></script>
<script src="js/script.js"></script>
</body>
</html>