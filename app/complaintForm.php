<?php
require_once '../config.php';
require_once $setupPath;
loadClassByType("AuthService", "class");
loadClassByType("modelUser", "model");
$smarty = new UserSmarty();
loadClassByType("entityFormType", "entity");
loadClassByType("modelFormType", "model");
if(!AuthService::getInstance()->isAuthenticated()){
  header("location:index.php");  
}
$theId = isset($_GET["formTypeId"])? intval($_GET["formTypeId"]): 0;
if( 0 == $theId){
  $smarty->setSessionNotification('Tipul de plangere cautat nu este disponibila', "error");
  header("location:index.php");
  return;
}
$theUserModel = new modelUser();
$theFormTypeModel = new modelFormType();
$theFormType = $theFormTypeModel->getById($theId);

$theUser = $theUserModel->getById($_SESSION['user']['id']);

$theAction = isset($_GET["action"])? $_GET["action"]: "";
if('upload' == $theAction){
  loadClassByType("entityForm", "entity");
  loadClassByType("modelForm", "model");
  $info = pathinfo($_FILES['uploadedfile']['name']);
  $theExt = $info['extension'];
  $theNewName =  $_SESSION['user']['id']. "_P_" .rand(10,100). "." .$theExt; 
  $theTargetPath = $theUploadComplaintPath . $theNewName;
  move_uploaded_file( $_FILES['uploadedfile']['tmp_name'], $theTargetPath);
  $theFormModel = new modelForm();
  $theFormEntity = new entityForm();
  $theFormEntity->setFormTypeId($theId);
  $theFormEntity->setUserId($_SESSION['user']['id']);
  $theFormEntity->setPath('plangeri/'. $theNewName);
  $theInsertedForm = $theFormModel->insert($theFormEntity);
  $smarty->setSessionNotification('Plangerea a fost depusa', "success");
  header("location:index.php");
  return;
}
$smarty->assign("formTypeValue", "complaint");
$smarty->assign("notificationMsg", $_SESSION['notificationMsg']);
$smarty->assign("notificationType", $_SESSION['notificationType']);
$smarty->assign("notification", $smarty->fetch("notification.tpl"));
$smarty->assign("formTypeId", $theId);
$smarty->assign("formTypeName", $theFormType->getName());
$smarty->assign("formPath", '../forms/'.$theFormType->getName().'.pdf');
$smarty->assign("xmlPath", '../xml/'.$_SESSION['user']['id'].'Xml.xml');
$smarty->display("form.tpl");
?>


