<?php

function loadClassByType($aClassName, $aType){
  $filename = dirname(__FILE__) ."/". $aType ."/". $aClassName . ".php";
  if (file_exists(($filename))) {
    require_once $filename;
  } else {
    throw new Exception("Class $aClassName not found in / $aType directory");
  }
}
$setupPath = dirname(__FILE__) ."/class/setup.php";
$theRootPath = dirname(__FILE__);
$theUploadDemandPath = $theRootPath .'/cereri/';
$theUploadComplaintPath = $theRootPath .'/plangeri/';
session_start();
ini_set('display_errors', 2);
date_default_timezone_set('Europe/Bucharest');
define ('DB_HOST', "RAZVAN\SQL2012");
define ('DB_Database', "Proiect");
define ('DB_UID', "sa");
define ('DB_PWD', "root");
define ('siteURL', 'http://licenta.localhost/app');
define ('mailHost', "smtp.gmail.com");
define ('mailFrom', "licenta.primarie@gmail.com");
?>