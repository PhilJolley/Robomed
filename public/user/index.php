<?php
  //contains all the functions
  require_once('../../private/initialize.php'); //we need to define the directory. Always use static strings!!!!
  //we still have to use the .. because of the initialized where it's all defined for paths.
  $uid = $LS->getUser('id');
  $fb = get_social($uid, 1, $db);
  $linkedin = get_social($uid, 2, $db);
  $twitter = get_social($uid, 3, $db);
	$reddit = get_social($uid, 4, $db);
  $Ethereum = get_social($uid, 5, $db);
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
          <a href="<?php echo url_for('/user/index.php'); ?>" class="list-group-item active main-color-bg">
          <i id = "gear" class="fa fa-gear"></i>  Dashboard
          </a>
          <a href="/public/user/subjects/blog.php" class="list-group-item"><i id = "blogIcon" class="fa fa-pencil-square-o"></i> Write Blog Posts</a>
          <a href="/public/user/subjects/translate.php" class="list-group-item"><i id = "translateIcon" class="fa  fa-file-text"></i> Translate</a>
          <!--<a href="/public/user/subjects/index_FB.php" class="list-group-item"><i id = "FacebookLogo" class="fa  fa-facebook-square"></i> Facebook</a>
          <a href="/public/user/subjects/index_LI.php" class="list-group-item"><i id = "LinkedIn" class="fa fa-linkedin-square"></i> LinkedIn</a>
          <a href="/public/user/subjects/index_twt.php" class="list-group-item"><i id = "Twitter" class="fa fa-twitter"></i> Twitter</a>-->
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
            
            <div class="col-md-3 text-center">
              <div class="well dash-box">
                <h2><?php echo $sum = intval($Ethereum['like']) + intval($Ethereum['comment']) + intval($Ethereum['share']); ?></h2>
                <h3>Ethereum</h3>
                <p id ="dont">Don't have a <a href="https://www.youtube.com/watch?v=phht73IvUDI">ERC20 Standard Wallet ID?</a></p>
                <form class="form-inline" action="#" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control disabled" id="urlBIT" placeholder="ERC20 Standard Wallet ID" value="<?php echo isset($_POST['url']) ? $_POST['url'] : '' ?>" name="url">
                    <input type="hidden" name="type" value="5" />
                    <button type="submit" class="btn btn-default disabled">Save</button><br /><br />
                    <img src="<?php echo url_for('/img/ETHEREUM.png'); ?>" style="width:45px;height:55px;"> <!-- style="width:200px;height:200px;" -->
                    <p id ="dont">Want to know what your Ethereum's worth?<br> Multiply your Ethereum by today's <a href="https://www.coindesk.com/ethereum-price/">price</a>.</p>
                  </div>
                </form>
              </div>
            </div>
            
            <div class="col-md-3 text-center">
              <div class="well dash-box">
                <h2><?php echo $sum = intval($fb['like']) + intval($fb['comment']) + intval($fb['share']); ?></h2>
                <h3>Facebook</h3>
                <p id ="dont">Reward<a href="point_break_down.php"> Distribution</a></p>
                <form class="form-inline" action="#" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control disabled" id="urlFB" placeholder="Facebook URL" name="url"><br />
                    <input type="hidden" name="type" value="1">
                    <button type="submit" id ="buttonFB" class="btn btn-default disabled">Save</button><br><br>
                    <div class="fb-like" data-href="https://www.facebook.com/RobomedNetwork/" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
                    <p><strong>Reward:</strong> Liked post = 5 shares,<br /> Like us on Facebook  = 10 shares, <br>Share Robomed on Facebook = 30 shares </p>
                  </div>
                </form>
              </div>
            </div>

            <div class="col-md-3 text-center">
              <div class="well dash-box">
                <h2><?php echo $sum = intval($linkedin['like']) + intval($linkedin['comment']) + intval($linkedin['share']); ?></h2>
                <h3>LinkedIn</h3>
                <p id ="dont">Reward<a href="point_break_down.php"> Distribution</a></p>
                <form class="form-inline" action="#" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control disabled" id="urlLI" placeholder="LinkedIn URL" name="url">
                    <input type="hidden" name="type" value="2">
                    <button type="submit" class="btn btn-default disabled">Save</button><br><br>
                    <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                    <script type="IN/Share" data-url="https://www.linkedin.com/company/robomed"></script>
                    
                    <a href="https://www.linkedin.com/company/18285202/"><i id="LinBadge" class="fa fa-linkedin-square"></i></a>
                    <p>*When directed to Twitter, hit follow.<br><strong>Reward:</strong> Liked post = 5 shares,<br /> Follow us on LinkedIn  = 10 shares, <br>Share Robomed on LinkedIn = 30 shares </p>
                  </div>
                </form>
              </div>
            </div>

            <div class="col-md-3 text-center">
              <div class="well dash-box">
                <h2><?php echo $sum = intval($twitter['like']) + intval($twitter['comment']) + intval($twitter['share']); ?></h2>
                <h3>Twitter</h3>
                <p id ="dont">Reward<a href="point_break_down.php"> Distribution</a></p>
                <form class="form-inline" action="#" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control disabled" id="urlTWT" placeholder="Twitter URL" name="url">
                    <input type="hidden" name="type" value="3">
                    <button type="submit" class="btn btn-default disabled">Save</button><br><br>
                    <a href="https://twitter.com/intent/tweet?text=@Robomed_Network"
                    style="color:rgb(255,255,255); background-color: rgb(0, 172, 237); text-decoration: none;"
                    class="btn btn-default" role="button">
                    Tweet</a>
                    <a href="https://twitter.com/Robomed_Network"
                      style="color:rgb(255,255,255); background-color: rgb(0, 172, 237); text-decoration: none;"
                      class="btn btn-default" role="button">
                    Follow</a>
                    <p>*When directed to Twitter, hit follow.<br><strong>Reward:</strong> Liked post = 5 shares,<br /> Like us on Twitter  = 10 shares, <br>Share Robomed on Twitter = 30 shares </p>
                  </div>
                </form>
              </div>
            </div>
            
            <div class="col-md-3 text-center">
              <div class="well dash-box">
                <h2><?php echo $sum = intval($reddit['like']) + intval($reddit['comment']) + intval($reddit['share']); ?></h2>
                <h3>Reddit</h3>
                <p id ="dont">Reward<a href="point_break_down.php"> Distribution</a></p>
                <form class="form-inline" action="#" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control disabled" id="urlTWT" placeholder="Reddit URL" name="url">
                    <input type="hidden" name="type" value="4">
                    <button type="submit" class="btn btn-default disabled">Save</button><br /><br />
                    <a href="//www.reddit.com/submit" onclick="window.location = '//www.reddit.com/submit?url=' + encodeURIComponent(window.location); return false"> <img src="//www.redditstatic.com/spreddit13.gif" alt="submit to reddit" border="0" /> </a>
                    <p><strong>Reward:</strong> Liked post = 5 shares,<br /> Like us on Reddit  = 10 shares, <br>Share Robomed on Reddit = 30 shares </p>
                  </div>
                </form>
              </div>
            </div>
            <!--tracker-->

          </div>
        </div>
      </div>


<!-- footer -->
<?php include(SHARED_PATH . '/user_footer.php'); ?>
