<?php
require_once '../config.php';
require_once $setupPath;
loadClassByType("AuthService", "class");
loadClassByType("modelCustom", "model");
$smarty = new UserSmarty();
loadClassByType("entityFormType", "entity");
loadClassByType("modelFormType", "model");
if(!AuthService::getInstance()->isAuthenticated()){
  header("location:index.php");  
}
$theCustomModel = new modelCustom();
$theDemandStats = $theCustomModel->getDemandsStats();
$smarty->assign("nrAccepteDemands", $theDemandStats['AcceptedDemands']);
$smarty->assign("nrRejectedDemands", $theDemandStats['RejectedDemands']);
$smarty->assign("nrPendingDemands", $theDemandStats['PendingDemands']);
$smarty->assign("totalDemands", $theDemandStats['TotalDemands']);

$theComplaintStats = $theCustomModel->getComplaintsStats();
$smarty->assign("nrResolvedComplaints", $theComplaintStats['ResolvedComplaints']);
$smarty->assign("nrPendingComplaints", $theComplaintStats['PendingComplaints']);
$smarty->assign("totalComplaints", $theComplaintStats['TotalComplaints']);

$smarty->assign("notificationMsg", $_SESSION['notificationMsg']);
$smarty->assign("notificationType", $_SESSION['notificationType']);
$smarty->assign("notification", $smarty->fetch("notification.tpl"));
$smarty->assign("xmlPath", '../xml/'.$_SESSION['user']['id'].'Xml.xml');
$smarty->display("stats.tpl");
?>


