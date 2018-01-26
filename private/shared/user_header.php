<?php
  if(!isset($page_title)){
    $page_title = "User Dashboard";
  }
 ?>

 <html>
 <head>
   <title>Profile Page</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/styles.css'); ?>" />
 </head>
 <body>
   <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
           <div class="container-fluid">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                   <button id="button1" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                       <span class="sr-only">Toggle navigation</span> Menu <i id = "User" class="fa fa-user-circle"></i>
                   </button>
                   <a class="navbar-brand" href="<?php echo url_for('/user/index.php'); ?>" id="ColorChange">Robomed Bounty for Good</a>
               </div>

               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   <ul id="text" class="nav navbar-nav navbar-right">
                       <li class="active main-color-bg2">
                           <a class="page-scroll" href="<?php echo url_for('/user/index.php'); ?>"><i id = "User" class="fa  fa-user"></i> Welcome, <?php echo $LS->getUser('user_name');?></a>
                       </li>
                     	<li class="dropdown">
                          <a id="navBarVis" class="dropdown-toggle" data-toggle="dropdown" href="#">Collect and Give
                          <i id = "SignOut" class="fa fa-arrow-circle-down"></i></a>
                          <ul class="dropdown-menu">
                            <li>
                                <a class="page-scroll" href="<?php echo url_for('/user/index.php'); ?>">Dashboard</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo url_for('/user/subjects/blog.php'); ?>">Write Blog Posts</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo url_for('/user/subjects/translate.php'); ?>">Translate</a>
                            </li>
                            <!--<li>
                                <a class="page-scroll" href="<?php echo url_for('/user/subjects/index_FB.php'); ?>">Facebook</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo url_for('/user/subjects/index_LI.php'); ?>">LinkedIn</a>
                            </li>
                            <li>
                                <a class="page-scroll" href="<?php echo url_for('/user/subjects/index_twt.php'); ?>">Twitter</a>
                            </li>-->
                            
                          </ul>
                        </li>
                     
                     <li>
                           <a class="page-scroll" href="/public/user/about_us.php"><i id = "SignOut" class="fa fa-dot-circle-o"></i> About Campaign</a>
                       </li>
                     	
                       <li>
                           <a class="page-scroll" href="/public/user/pages/reset_password.php">Change Password</a>
                       </li>
                       <li>
                           <a class="page-scroll" href="/public/user/logout.php"><i id = "SignOut" class="fa fa-sign-out"></i> Log out</a>
                       </li>
                   </ul>
               </div>
               <!-- /.navbar-collapse -->
           </div>
           <!-- /.container-fluid -->
   </nav>
   <!-- Header -->
   <header>
     <div class="container">
       <div class = "row">
       <div class="jumbotron text-center">
         <div class="col-lg-1 col-md-1 col-sm-1 col-lg-pull-1 col-md-pull-1 col-sm-pull-1">
           <img id="test" src="<?php echo url_for('/img/robomed logo.png'); ?>" /> <!-- style="width:200px;height:200px;" -->
         </div>
         <div class="col-lg-6 col-sm-6">
           <h1 id="Title">Robomed<br>Bounty for Good</h1>
             <!--<h2>Bounty for Good</h2>-->
         </div>
         <div class="col-lg-5 col-sm-5">
           <!-- timer -->
           <h1 id ="ICO">ICO Ends:</h1>
           <p id="demo"></p>
              <script>
              // Set the date we're counting down to
              var countDownDate = new Date("Dec 19, 2017 23:59:59").getTime();

              // Update the count down every 1 second
              var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

                // If the count down is finished, write some text
                if (distance < 0) {
                  clearInterval(x);
                  document.getElementById("demo").innerHTML = "The ICO is over, thanks for participating.";
                }
              }, 1000);
              </script>
         </div>
       </div>
       </div>
     </div>
   </header>

   <!-- Breadcrumbs -->
   <section id="breadcrumb">
     <div class="container-fluid">
       <ol class="breadcrumb">
         <li class="active">
           Dashboard
         </li>
       </ol>
     </div>
   </section>
