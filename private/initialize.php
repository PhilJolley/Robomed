<?php

ob_start(); // output buffering is turned on

session_start(); // turn on sessions
  // Assign file paths to PHP constants
  // __FILE__ returns the current path to this file
  // dirname() returns the path to the parent directory
  define("PRIVATE_PATH", dirname(__FILE__)); //returns the path the file and get the directory
  define("PROJECT_PATH", dirname(PRIVATE_PATH)); //goes back one.
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

  //we're going to tell initialize php to load up everything that is in functions.php

  // Assign the root URL to a PHP constant
  // * Do not need to include the domain
  // * Use same document root as webserver
  // * Can set a hardcoded value:
  // define("WWW_ROOT", '/~kevinskoglund/globe_bank/public');
  // define("WWW_ROOT", '');
  // * Can dynamically find everything in URL up to "/public"
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root); //finds it dynamically. "WWW_ROOT" is set for an absolute value.
  require_once('database.php');
  require_once('functions.php');
  require_once('login_config.php');
 //we want to use require because the website requires the functions if
                                // we want the website to work correctly, and once because we only want to load them one time.

    require_once('query_functions.php');
    //require_once('validation_functions.php');
    require_once('auth_functions.php');

    $db = db_connect(); //anytime a page loads initialize.php it will initiate the  db connection
    $uid = $LS->getUser('id');
    //$errors = [];
?>
