<?php
  //contains all the functions
  require_once('../../../private/initialize.php');

  if (isset($_POST['verify'])) {
      if (isset($_POST['current_password']) && $_POST['current_password'] != '' && isset($_POST['new_password']) && $_POST['new_password'] != '' && isset($_POST['retype_password']) && $_POST['retype_password'] != '' && isset($_POST['current_password']) && $_POST['current_password'] != '') {
          $curpass         = $_POST['current_password'];
          $new_password    = $_POST['new_password'];
          $retype_password = $_POST['retype_password'];

          if ($new_password != $retype_password) {
              echo "<p><h2>Passwords Doesn't match</h2><p>The passwords you entered didn't match. Try again.</p></p>";
          } elseif ($LS->login($LS->getUser('user_name'), $curpass, false, false) == false) {
              echo '<h2>Current Password Wrong!</h2><p>The password you entered for your account is wrong.</p>';
          } else {
              $change_password = $LS->changePassword($new_password);
              if ($change_password === true) {
                  //echo '<h2>Password Changed Successfully</h2>';
                  redirect_to('/Robomed_Network/public/user/index.php');
              }
          }
      } else {
          echo '<p><h2>Password Fields was blank</h2><p>Form fields were left blank</p></p>';
          // to place text in a certain spot, create variable and echo isset() it in the location you want
      }

  }

?>

<?php $page_title = "User"; ?>
<!-- header -->
<?php include(SHARED_PATH . '/new_header.php'); ?>

<section id="Bkgcolor">
  <div class="container-fluid">
    <form class="form-horizontal" action="#" method="post">
      <div class="col-sm-12 text-center">
        <img src="<?php echo url_for('/img/robomed-logo-red.jpg'); ?>" style="width:80px;height:80px;margin-bottom: 10px;">
      </div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-4">
          <input type="password" class="form-control" name="current_password" id="FN" placeholder="Current Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-4">
          <input type="password" class="form-control" name="new_password"  id="UN" placeholder="New Password">
        </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4 col-sm-offset-4">
        <input type="password" class="form-control" name="retype_password" id="email" placeholder="Confirm Password">
      </div>
    </div>
    <div class="form-group">
      <input type='hidden' name='verify' value='yes'>
      <div class="col-sm-offset-4 col-sm-8">
        <!-- <a class="action" href="#"><button id="signUp" type="submit" class="btn btn-default">Sign up</button></a>-->
        <input type='hidden' name='verify' value='yes'>
        <button  id="signUp" class="btn btn-default" type="submit">Change Password</button>
      </div>
    </div>
  </form>
  </div>
</section>


<!-- footer -->
<?php include(SHARED_PATH . '/user_footer.php'); ?>
