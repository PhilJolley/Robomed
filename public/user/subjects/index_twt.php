<?php
  //contains all the functions
  require_once('../../../private/initialize.php'); //we need to define the directory. Always use static strings!!!!
  //we still have to use the .. because of the initialized where it's all defined for paths.

  $twitter = get_social($uid, 3, $db);
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
          <a href="/public/user/subjects/index_FB.php" class="list-group-item"><i id = "FacebookLogo" class="fa  fa-facebook-square"></i> Facebook</a>
          <a href="/public/user/subjects/index_FB.php" class="list-group-item"><i id = "LinkedIn" class="fa fa-linkedin-square"></i> LinkedIn</a>
          <a href="/public/user/subjects/index_FB.php" class="list-group-item active main-color-bg"><i id = "Twitter" class="fa fa-twitter"></i> Twitter</a>
        </div>
      </div>

      <div class="col-md-9">
        <!--User Panel -->
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Twitter Profile Overview (Updated every 48 hours)</h3>
          </div>
          <div class="panel-body">
            <div class="col-md-4 text-center">
              <div class="well dash-box">
                <h2><?php echo intval($twitter['like']) ?></h2>
                <h3><i id = "tweet" class="fa fa-twitter"></i> Tweet</h3>
                <a href="https://twitter.com/intent/tweet?text=@Robomed_Network"
                style="color:rgb(255,255,255); background-color: rgb(0, 172, 237); text-decoration: none;"
                class="btn btn-default" role="button">
                Tweet</a>
                <a href="https://twitter.com/Robomed_Network"
                  style="color:rgb(255,255,255); background-color: rgb(0, 172, 237); text-decoration: none;"
                  class="btn btn-default" role="button">
                Follow</a>
              </div>
            </div>

            <div class="col-md-4 text-center">
              <div class="well dash-box">
                <h2><?php echo intval($twitter['share']) ?></h2>
                <h3><i id ="retweet" class="fa fa-retweet"></i> Retweet</h3>
                <blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">Robomed Network at ICO event London 2017 <a href="https://t.co/crL0MnVelb">https://t.co/crL0MnVelb</a> via <a href="https://twitter.com/YouTube?ref_src=twsrc%5Etfw">@YouTube</a> <a href="https://twitter.com/hashtag/robomed?src=hash&amp;ref_src=twsrc%5Etfw">#robomed</a> <a href="https://twitter.com/hashtag/robomednetwork?src=hash&amp;ref_src=twsrc%5Etfw">#robomednetwork</a> <a href="https://twitter.com/hashtag/blockchain?src=hash&amp;ref_src=twsrc%5Etfw">#blockchain</a> <a href="https://twitter.com/hashtag/ico?src=hash&amp;ref_src=twsrc%5Etfw">#ico</a></p>&mdash; Robomed (@Robomed_Network) <a href="https://twitter.com/Robomed_Network/status/918149121600622592?ref_src=twsrc%5Etfw">October 11, 2017</a></blockquote>
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
              </div>
            </div>

            <div class="col-md-4 text-center">
              <div class="well dash-box">
                <h2><?php echo intval($linkedin['comment']) ?></h2>
                <h3><i id = "heart" class="fa fa-heart"></i> Like</h3>
              </div>
            </div>
            <!--tracker-->

          </div>
        </div>
      </div>



<!-- footer -->
<?php include(SHARED_PATH . '/user_footer.php'); ?>
