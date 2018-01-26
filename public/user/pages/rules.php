<?php
  //contains all the functions
  require_once('../../../private/initialize.php'); //we need to define the directory. Always use static strings!!!!
  //we still have to use the .. because of the initialized where it's all defined for paths.

?>



<?php $page_title = "User"; ?>
<!-- header -->
<?php include(SHARED_PATH . '/login_header.php'); ?>

<div class="container-fluid">
  <div id="jumbo" class="jumbotron">
    <h1>"Lorem ipsum" text is derived from sections 1.10.33 of Cicero's De finibus bonorum et malorum.[3]

It is not known exactly when the text obtained its current standard form; it may have been as late as the 1960s. Dr. Richard McClintock, a Latin scholar who was the publications director at Hampden–Sydney 
</h1>


  </div>
</div>



<!-- footer -->
<?php include(SHARED_PATH . '/user_footer.php'); ?>
