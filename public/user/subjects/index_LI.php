<?php
  //contains all the functions
  require_once('../../../private/initialize.php'); //we need to define the directory. Always use static strings!!!!
  //we still have to use the .. because of the initialized where it's all defined for paths.

  $linkedin = get_social($uid, 2, $db);
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
          <a href="/public/user/subjects/index_LI.php" class="list-group-item active main-color-bg"><i id = "LinkedIn" class="fa fa-linkedin-square"></i> LinkedIn</a>
          <a href="/public/user/subjects/index_twt.php" class="list-group-item"><i id = "Twitter" class="fa fa-twitter"></i> Twitter</a>
        </div>
      </div>

      <div class="col-md-9">
        <!--User Panel -->
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">LinkedIn Profile Overview (Updated every 48 hours)</h3>
          </div>
          <div class="panel-body">
            <div class="col-md-4 text-center">
              <div class="well dash-box">
                <h2><?php echo intval($linkedin['like']) ?></h2>
                <h3><i id ="pencil" class="fa fa-pencil"></i> Post</h3>

              </div>
            </div>

            <div class="col-md-4 text-center">
              <div class="well dash-box">
                <h2><?php echo intval($linkedin['share']) ?></h2>
                <h3><i id = "shareLI" class="fa fa-share-square"></i> Share</h3>
                <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                <script type="IN/Share" data-url="https://www.linkedin.com/company/robomed"></script>

                <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                <script type="IN/FollowCompany" data-id="1337"></script>
              </div>
            </div>

            <div class="col-md-4 text-center">
              <div class="well dash-box">
                <h2><?php echo intval($linkedin['comment']) ?></h2>
                <h3><i id = "inMail" class="fa fa-envelope"></i> InMail</h3>
              </div>
            </div>
            <!--tracker-->

          </div>
        </div>
      </div>



<!-- footer -->
<?php include(SHARED_PATH . '/user_footer.php'); ?>
