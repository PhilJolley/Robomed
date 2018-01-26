<?php

require_once('../../private/initialize.php');

?>

<?php $page_title = "User"; ?>
<!-- header -->
<?php include(SHARED_PATH . '/login_header.php'); ?>
<?php
		if(isset($_POST['password_reset'])){

			$reset_pass_token = $_GET['resetPassToken'];
			if($_POST['new_password'] !== $_POST['confrm_password']){
				$msg = array(
		                        'color' => 'danger',
		                        'text'  => 'The new password and retype password didn\'t match',
		                    );

			}else{
				$userID= $LS->getUserByToken($reset_pass_token);


				if(!empty($userID)){
				  $LS->changePassword($_POST['new_password'], $userID);

		                    $LS->removeToken($reset_pass_token);
		                    $msg = array(
			                        'color' => 'info',
			                        'text'  => 'Password Reset',
			                    );

				}else{
					$msg = array(
			                        'color' => 'danger',
			                        'text'  => 'Invalid Token',
			                    );
				}
			}

		}

 ?>
<section id = "form">
<div class="container">
<div class="col-sm-4 col-sm-offset-4"><h1>Reset Password</h1>
</div>
			<?php
            /**
             * Custom implementation of Reset Password
             */

            if (isset($_GET['resetPassToken'])) {
                if ($LS->verifyResetPasswordToken($_GET['resetPassToken'])) {

                    $msg = array( 'color' => 'green'); ?>
                    <div class="col-sm-4 col-sm-offset-4">Please Enter Your New Password</div>
                    <form class="form-horizontal" action="" method="POST">
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
				 <input type="password" id="newpass" class="form-control" name="new_password" Placeholder="New Password"/>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
				  <input type="password" id="c_pass" class="form-control" name="confrm_password" Placeholder="Retype Password" />
				</div>
			</div>
			<div class="form-group">
			  <div class="col-sm-offset-4 col-sm-8">
				<button type="submit" name="password_reset" class="btn red">Reset Password</button>
			  </div>
			</div>
		</form>

              <?php  } else {
                    $msg = array(
                        'color' => 'red',
                        'text'  => 'Invalid reset token',
                    ); ?>
                    <form class="form-horizontal" action="$url" method="GET">
			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
				  <input type="text" class="form-control" name="resetPassToken"  placeholder="Enter Token">
				</div>
			</div>
			<div class="form-group">
			  <div class="col-sm-offset-4 col-sm-8">
				<button  name="submit"  class="btn btn-default" type="submit">Verify</button>
			  </div>
			</div>
		</form>

             <?php    }
            } else {

                if (isset($_POST['identification'])) {

                    if (!$LS->userExists($_POST['identification'])) {
                        $msg = array(
                            'color' => 'red',
                            'text'  => 'User does not exist',
                        );
                    } else {
                        $hide_reset_pass_form = true;
                        $uid                  = $LS->login($_POST['identification'], false, false, false);

                        $LS->sendResetPasswordToken(  $uid );

                        $url = Fr\LS::curPageURL();
                        $msg = array(
                            'color' => 'black',
                            'text'  => <<<HTML
<div class="col-sm-4 col-sm-offset-4">An email with instructions has been sent to you. Check your Email Inbox and SPAM folders. You may follow the link in the email or enter the token below :</div><br />

<form class="form-horizontal" action="$url" method="GET">
	<div class="form-group">
		<div class="col-sm-4 col-sm-offset-4">
		  <input type="text" class="form-control" name="resetPassToken"  placeholder="Enter Token">
		</div>
	</div>
	<div class="form-group">
	  <div class="col-sm-offset-4 col-sm-8">
		<button  name="submit"  class="btn btn-default" type="submit">Verify</button>
	  </div>
	</div>
</form>
HTML
                        );
                    }
                }

                if (isset($msg)) {
                    echo <<<HTML
<div class="card-panel {$msg['color']}">
	<span class="white-text">{$msg['text']}</span>
</div>
HTML;
                }

            if (!isset($hide_reset_pass_form))
			{
                    ?>
					<form class="form-horizontal" action="<?php echo Fr\LS::curPageURL(); ?>" method="POST">
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-4">
							  <input type="text" class="form-control" name="identification" id="FN" placeholder="Username or Email">
							</div>
						</div>
						<div class="form-group">
						  <div class="col-sm-offset-4 col-sm-8">
							<button  name="submit"  class="btn btn-default" type="submit">Reset Password</button>
						  </div>
						</div>
					</form>
			<?php
            }
            }
            ?>
		</div>
</section>
	</body>
</html>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
