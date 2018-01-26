<?php
  //contains all the functions
  require_once('../../../private/initialize.php'); //we need to define the directory. Always use static strings!!!!
  //we still have to use the .. because of the initialized where it's all defined for paths.
  //require_login();
  $fb = get_social($uid, 1, $db);
?>

<!-- Staff Index root -->
<?php $page_title = "User"; ?>
<!-- header -->
<?php include(SHARED_PATH . '/user_header.php'); ?>

<!-- Main Area -->
<section id="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="<?php echo url_for('/user/index.php'); ?>" class="list-group-item">
          <i id = "gear" class="fa fa-gear"></i>  Dashboard
          </a>
          <a href="/public/user/subjects/index_FB.php" class="list-group-item active main-color-bg"><i id = "FacebookLogo2" class="fa  fa-facebook-square"></i> Facebook</a>
          <a href="/public/user/subjects/index_LI.php" class="list-group-item"><i id = "LinkedIn2" class="fa fa-linkedin-square"></i> LinkedIn</a>
          <a href="/public/user/subjects/index_twt.php" class="list-group-item"><i id = "Twitter2" class="fa fa-twitter"></i> Twitter</a>
        </div>
      </div>

      <div class="col-md-9">
        <!--User Panel -->
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Facebook Profile Overview (Updated every 48 hours)</h3>
          </div>
          <div class="panel-body">
            <div class="col-md-3 text-center">
              <div class="well dash-box">
                <h2 id="Like"> <?php echo intval($fb['like']); ?></h2>
                <h3><i id = "likeFB" class="fa fa-thumbs-o-up"></i> Like</h3>
                <button id="likeBTN" onclick="oneClick()" class="btn btn-default">Like</button> <!-- data-href="https://www.facebook.com/RobomedNetwork" data-action="like" type="button" data-show-faces="true" data-share="false" -->
              </div>

              <div class="well dash-box">
                <h2 id="share"> <?php echo intval($fb['share']); ?></h2> <!-- <h2 id="share">0</h2> -->
                <h3><i id = "shareFB" class="fa fa-share"></i> Share</h3>
                <!--<button onclick="addFunction()" type="button" class="btn btn-default">Share</button><br /> -->
                <a onclick="addFunction()" data-href="https://www.facebook.com/RobomedNetwork" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2FRobomedNetwork&amp;src=sdkpreparse"
                id = "shareButton"
                class="btn btn-default" role="button">
                Share</a>
              </div>
            </div>

            <div class="col-md-3 text-center">
              <div class="well dash-box">
                <h2><?php echo intval($fb['comment']) ?></h2>
                <h3><i id = "fbPencil" class="fa fa-pencil-square"></i> Comment</h3>
              </div>
            </div>
            <!--tracker-->
            <div class="col-md-6">
              <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FRobomedNetwork&width=600&colorscheme=light&show_faces=true&border_color&stream=true&header=true&height=435"
              scrolling="yes" frameborder="0" style="border:none; overflow:hidden; width:600px; height:430px; background: white; float:left;" allowTransparency="true">
              </iframe>
            </div>

          </div>
        </div>
      </div>


<!-- footer -->
<?php include(SHARED_PATH . '/user_footer.php'); ?>
