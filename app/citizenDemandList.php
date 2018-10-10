<?php
require_once '../config.php';
require_once $setupPath;
loadClassByType("AuthService", "class");
loadClassByType("modelForm", "model");
loadClassByType("modelFormType", "model");
$smarty = new UserSmarty();
if(!AuthService::getInstance()->isAuthenticated()){
  header("location:index.php");  
}
$theModelForm = new modelForm();
$theModelFormType = new modelFormType();
$theTableData = $theModelForm->getAllDocumentsByTypeAndUserId("'c'", AuthService::getInstance()->getLoggedUser()['id']);
$smarty->assign("theTableData", $theTableData);
$smarty->assign("notificationMsg", $_SESSION['notificationMsg']);
$smarty->assign("notificationType", $_SESSION['notificationType']);
$smarty->assign("notification", $smarty->fetch("notification.tpl"));
$smarty->clearSessionNotification();
$smarty->display("citizenDemandList.tpl");
?>


