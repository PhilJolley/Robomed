<?php
  //contains all the functions
  require_once('../../../private/initialize.php'); //we need to define the directory. Always use static strings!!!!
  //we still have to use the .. because of the initialized where it's all defined for paths.
  $uid = $LS->getUser('id');
  $fb = get_social($uid, 1, $db);
  $linkedin = get_social($uid, 2, $db);
  $twitter = get_social($uid, 3, $db);
  if(isset($_POST['type'])){
    if($_POST['url'] != ''){
      $insert = insert_social(array(
        'url' => $_POST['url'],
        'type' => $_POST['type'],
        'user_id' => $uid
      ), $db);
      if($insert != true){
        echo $insert;
      } else {
        echo 'success';
      }
    }
  }
  if(isset($_POST['bitcoin'])){
      $LS->updateUser(array(
        "bitcoin" => $_POST['bit']
      ), $uid);
  }
?>

<!-- Staff Index root -->
<?php $page_title = "User"; ?>
<!-- header -->
<?php include(SHARED_PATH . '/user_header.php'); ?>

<!-- Main Area -->
<section id="main">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <a href="<?php echo url_for('/user/index.php'); ?>" class="list-group-item">
          <i id = "gear" class="fa fa-gear"></i>  Dashboard
          </a>
          <!--<a href="/Robomed_Network/public/user/subjects/index_FB.php" class="list-group-item"><i id = "FacebookLogo" class="fa  fa-facebook-square"></i> Facebook</a>-->
          <a href="/public/user/subjects/blog.php" class="list-group-item active main-color-bg"><i id = "blogIcon" class="fa fa-pencil-square-o"></i> Write Blog Posts</a>
          <a href="/public/user/subjects/translate.php" class="list-group-item"><i id = "translateIcon" class="fa  fa-file-text"></i> Translate</a>
          <!--<a href="/Robomed_Network/public/user/subjects/index_LI.php" class="list-group-item"><i id = "LinkedIn" class="fa fa-linkedin-square"></i> LinkedIn</a>
          <a href="/Robomed_Network/public/user/subjects/index_twt.php" class="list-group-item"><i id = "Twitter" class="fa fa-twitter"></i> Twitter</a>
          <a href="/Robomed_Network/public/user/subjects/index_twt.php" class="list-group-item"><i id = "Twitter" class="fa  fa-telegram"></i> Telegram</a> -->
        </div>
        <!--<div id="progress" class="well">
          <h4>Profile progress</h4>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
              0%
            </div>
          </div>
        </div> -->
      </div>

      <div class="col-md-10">
        <!--User Panel -->
        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Profile Overview (Updated every 48 hours)</h3>
          </div>
          <div class="panel-body">
            <div class="container text-center">
              <h1>COMING SOON!</h1>
            </div>


            <!--tracker-->

          </div>
        </div>
      </div>


<!-- footer -->
<?php include(SHARED_PATH . '/user_footer.php'); ?>
