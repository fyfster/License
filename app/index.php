<?php
require_once '../config.php';
require_once $setupPath;
loadClassByType("AuthService", "class");
$smarty = new UserSmarty();
if(isset($_GET["action"])){
  switch($_GET["action"]){
    case "login":
      if (count($_POST) > 0) {
        $theUser = AuthService::getInstance()->login($_POST['userName'], $_POST['password']);
        if ($theUser) {
          header("location:index.php");
          return;
        } else {
          $smarty->setSessionNotification("Utilizatorul sau parola sunt invalide", "error");
          header("location:index.php?action=login");
          return;
        }
      }
      $smarty->display("login.tpl");
      break;
      
    case "logout":
      AuthService::getInstance()->logout();
      header("location:index.php");
      break;
  }
}
if(empty($_SESSION)){
  $_SESSION['notificationMsg'] = '';
  $_SESSION['notificationType'] = '';
}
$smarty->assign("notificationMsg", $_SESSION['notificationMsg']);
$smarty->assign("notificationType", $_SESSION['notificationType']);
$smarty->assign("notification", $smarty->fetch("notification.tpl"));
$smarty->clearSessionNotification();
if(!isset($_GET["action"])){
  $smarty->display("index.tpl");
}
?>


