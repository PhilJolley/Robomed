<?php
  if(!isset($page_title)){
    $page_title = "User Dashboard";
  }
 ?>

 <html>
 <head>
   <title>Robomed Network | Log in</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/styles2.css'); ?>" />

 </head>

 <body id ="body">
   <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
           <div class="container-fluid">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                   <button id="button1" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                       <span class="sr-only">Toggle navigation</span> Menu <i id = "User" class="fa fa-user-circle"></i>
                   </button>
                   <a class="navbar-brand" href="<?php echo url_for('/index.php'); ?>" id="ColorChange">Robomed Bounty for Good</a>
               </div>

               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   <ul id="text" class="nav navbar-nav navbar-right">
                     	<li>
                         <a class="page-scroll" href="<?php echo url_for('/user/pages/about.php'); ?>"><i id = "newUser" class="fa fa-dot-circle-o"></i> About Campaign</a>
                     </li>
                     
                       <li>
                           <a class="page-scroll" href="<?php echo url_for('/user/pages/index.php'); ?>"><i id = "newUser" class="fa fa-user-plus"></i> Sign up</a>
                       </li>
                   </ul>
               </div>
               <!-- /.navbar-collapse -->
           </div>
           <!-- /.container-fluid -->
   </nav>
