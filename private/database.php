<?php
require_once('db_credentials.php');

function db_connect(){
  $pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME,  DB_USER, DB_PASS);
  confirm_db_connect();
  return $pdo;
}

function db_disconnect($connection){
  return true;
}

function db_escape($connection, $string){
  return mysqli_real_escape_string($connection, $string);
}

function confirm_db_connect(){
  if(mysqli_connect_errno()){
    $msg = "Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" .mysqli_connect_errorno() . ")";
    exit($msg);
  }
}

function confirm_result_set($result_set){
  if(!$result_set){
    exit("Database query failed");
  }
}
 ?>
