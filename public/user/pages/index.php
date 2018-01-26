<?php
  //contains all the functions
  require_once('../../../private/initialize.php'); //we need to define the directory. Always use static strings!!!!
  //we still have to use the .. because of the initialized where it's all defined for paths.

  //echo url_for('/user/index.php');
  //beau
function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LdMXjUUAAAAAM5GgwF7AySkAZMzAfO2RDjcb4B5',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

  if($_POST['verify'] == 'yes'){
    if($_POST['user_name'] == ''|| $_POST['full_name'] == '' || $_POST['email'] == '' || $_POST['password'] == '' || $_POST['confirm_password'] == ''){
      $msg = 'Form Incomplete';
    } elseif (!$LS->validEmail($_POST['email'])){
      $msg = 'Invalid Email';
    } elseif ($_POST['password'] != $_POST['confirm_password']){
      $msg = 'Passwords don\'t match';
    } else{
      $account = $LS->register($_POST['user_name'], $_POST['password'],
      array(
        "email" => $_POST['email'], "created" => date("Y-m-d H:i:s")
      ));
      if($account === "exists"){
        $msg = "User already exists";
      } elseif(!$res['success']){
        $msg = "Please go back and make sure you check the security CAPTCHA box.";
      } elseif($account === true && $res['success']){
        redirect_to('/public/index.php');
        $msg = "none";
      }
    }
  }




 // leave
  /*if(is_post_request()) {
    $subject = [];
    $user['full_name'] = $_POST['full_name'] ?? '';
    $user['user_name'] = $_POST['user_name'] ?? '';
    $user['email'] = $_POST['email'] ?? '';
    $user['password'] = $_POST['password'] ?? '';
    $user['confirm_password'] = $_POST['confirm_password'] ?? '';

    $result = insert_user($user);
    if($result === true) {
      $new_id = mysqli_insert_id($db);
      $_SESSION['message'] = 'Admin created.';
      redirect_to(url_for('/pages/index.php'));
    } else {
      $errors = $result;
    }

  } else {
    // display the blank form
    $user = [];
    $user["full_name"] = '';
    $user["email"] = '';
    $user["user_name"] = '';
    $user['password'] = '';
    $user['confirm_password'] = '';
  } */

?>

<!-- Staff Index root -->
<?php $page_title = "User"; ?>
<!-- header -->
<?php include(SHARED_PATH . '/new_header.php'); ?>

<section id="Bkgcolor">
  <div class="container-fluid">
    <form class="form-horizontal" action="<?php echo url_for('/user/pages/index.php'); ?>" method="post">
      <div class="col-sm-12 text-center">
        <img src="<?php echo url_for('img/robomed-logo-red.jpg'); ?>" style="width:80px;height:80px;margin-bottom: 10px;">
      </div>
      <?php if(isset($msg)){ ?>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-4">
          <div class="alert alert-danger">
            <strong>Error: </strong> <?php print_r($msg); ?>
          </div>
        </div>
      </div>
  <?php  }?>
      
      
      <?php if(isset($msgSuc)){ ?>
      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-4">
          <div class="alert alert-success">
            <strong>Success: </strong> <?php print_r($msgSuc); ?>
          </div>
        </div>
      </div>
  <?php  }?>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-4">
          <input type="text" class="form-control" name="full_name" value="<?php echo h($user['full_name']); ?>" id="FN" placeholder="Full Name">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-4">
          <input type="text" class="form-control" name="user_name" value="<?php echo h($user['user_name']); ?>" id="UN" placeholder="user_name">
        </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4 col-sm-offset-4">
        <input type="email" class="form-control" name="email" value="<?php echo h($user['email']); ?>" id="email" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4 col-sm-offset-4">
        <input type="password" class="form-control" name="password" value="" id="pwd" placeholder="Password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4 col-sm-offset-4">
        <input type="password" class="form-control" name="confirm_password" id="pwd" value="" placeholder="Confirm Password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-8">
        <p>
        Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
        </p>
        <div class="g-recaptcha" data-sitekey="6LdMXjUUAAAAAPDhlTTe3WyAsBmUL2DdQF3hc5tx"></div>
      </div>
    </div>
    <div class="form-group">
      <div class="g-recaptcha" data-sitekey="6LdMXjUUAAAAAPDhlTTe3WyAsBmUL2DdQF3hc5tx"></div>
      <input type='hidden' name='verify' value='yes'>
      <div class="col-sm-offset-4 col-sm-8">
        <!-- <a class="action" href="#"><button id="signUp" type="submit" class="btn btn-default">Sign up</button></a>-->
        <div class="g-recaptcha" data-sitekey="6LdMXjUUAAAAAPDhlTTe3WyAsBmUL2DdQF3hc5tx"></div>
        <button  id="signUp" class="btn btn-default" type="submit">Sign up</button>
      </div>
    </div>
  </form>
  </div>
</section>


<!-- footer -->
<?php include(SHARED_PATH . '/user_footer.php'); ?>
