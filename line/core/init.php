<?php
session_start();
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$GLOBALS['config'] = array(
  'mysql' => array(
    'host' => '127.0.0.1',
    'username' => 'root',
    'password' => '',
    'db' => 'app_line'
  ),
  'remember' => array(
    'cookie_name' => 'hash',
    'cookie_expiration' => 604800000,
  ),
  'session' => array(
    'session_name' => 'user',
    'token_name' => 'token'
  )
);

// Load classes
spl_autoload_register(function($class){
  require_once 'classes/' . $class . '.php';
});
require_once 'functions/sanitize.php';
// session_destroy();