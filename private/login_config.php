<?php
  require_once('Plugins/logSys-master/src/Fr/LS.php');
  require_once('Plugins/sessions-master/src/SessionTrait.php');
  require_once('Plugins/sessions-master/src/SessionInterface.php');
  require_once('Plugins/sessions-master/src/Cookie.php');
  require_once('Plugins/sessions-master/src/SessionInstance.php');
  $LS = new \Fr\LS(array(
    'db'       => array(
        'host'     => DB_SERVER,
        'port'     => 3306,
        'username' => DB_USER,
        'password' => DB_PASS,
        'name'     => DB_NAME,
        'table'    => 'user',
        'columns'  => array(
          'id' => 'id',
          'username' => 'user_name',
          'password' => 'hashed_password',
          'email' => 'email',
          'attempt' => 'attempt',
          'created' => 'created'
        )
    ),
    'features' => array(
        'auto_init' => true,
    ),
    'pages'    => array(
        'no_login'   => array(
            '/public/user/pages/index.php',
            '/public/user/pages/about.php',
    		'/public/user/forgot_form.php',
        ),
        'login_page' => '/public/index.php',
        'home_page'  =>  '/public/user/about_us.php',

    ),
));
 ?>
