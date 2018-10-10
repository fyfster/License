<?php
require_once '../config.php';
require_once $setupPath;
loadClassByType("AuthService", "class");
$smarty = new UserSmarty();

if(!isset($_GET["action"])){
  $smarty->display("news.tpl");
}
?>


