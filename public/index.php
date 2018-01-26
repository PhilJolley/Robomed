<?php
  //contains all the functions
  require_once('../private/initialize.php'); //we need to define the directory. Always use static strings!!!!
  //we still have to use the .. because of the initialized where it's all defined for paths.

  if (isset($_POST['verify'])) {
      $identification = $_POST['user_name'];
      $password       = $_POST['password'];
      if ($identification == '' || $password == '') {
          $msg ='Username / Wrong Password!';
      } else {
          $login = $LS->login($identification, $password, isset($_POST['remember_me']));
          if ($login === false) {
              $msg = 'Username / Wrong Password!';
          } elseif (is_array($login) && $login['status'] == 'blocked') {
              $msg = 'Too many login attempts. You can attempt login after ' . $login['minutes'] . ' minutes (' . $login['seconds'] . ' seconds)' ;
          }
      }
  }
?>

<!-- Staff Index root -->
<?php $page_title = "User"; ?>
<!-- header -->
<?php include(SHARED_PATH . '/login_header.php'); ?>
<?php if(isset($msg)){
  print_r($msg);
}
?>

<section id = "form">
  <div class="container-fluid">
  <form class="form-horizontal"  method="post" action="index.php">
    <div class="col-sm-12 text-center">
      <img src="<?php echo url_for('/img/robomed logo.png'); ?>" style="width:200px;height:200px;">
    </div>
    <?php if(isset($msg)){ ?>
    <div class="form-group">
      <div class="col-sm-4 col-sm-offset-4">
        <div class="alert alert-danger">
          <strong>Error: </strong> <?php echo $msg; ?>
        </div>
      </div>
    </div>
<?php  }?>
    <div class="form-group">
      <div class="col-sm-4 col-sm-offset-4">
        <input type="text" class="form-control" id="email" placeholder="Enter Username" name = "user_name" value="<?php echo h($user_name); ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4 col-sm-offset-4">
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-8">
        <div class="checkbox">
          <label><a href="/public/user/forgot_form.php">Forgot Password?</a> <br /><br /> Don't have an account? <a href="<?php echo url_for('/user/pages/index.php'); ?>">Sign Up</a></label>

        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-8">
        <input type='hidden' name='verify' value='yes'>
        <button id="LogIn" type="submit" class="btn btn-default">Log in</button>
      </div>
    </div>
  </form>
</div>
</section>


<!-- footer -->
<?php include(SHARED_PATH . '/user_footer.php'); ?>
