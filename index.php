<?php

//Setting default time zone
date_default_timezone_set('Asia/Calcutta');

//session stuff
if (!isset($_SESSION)){
  session_name('khtme');
  session_start();
}

//Defining Contstant for core application path
defined('APP_PATH') || define('APP_PATH', dirname(__FILE__).'/application');

require 'library/Bootstrap.php';
require 'library/Controller.php';
require 'library/View.php';
require 'library/Model.php';

$application = new Bootstrap();

?>