<?php
require_once '../config.php';
require_once $setupPath;
loadClassByType("AuthService", "class");
loadClassByType("mailer", "class");
loadClassByType("modelUser", "model");
$smarty = new UserSmarty();
$notificationMsg = "";
$ErrorList = array();
$theUser = array();
$theId = isset($_GET["id"])? intval($_GET["id"]) : 0 ;
if($theId == 0) {
	$smarty->setSessionNotification('Utilizatorul nu este valid', "error");
    header("location:index.php");
    return;
}

$theModelUser = new modelUser();
$theLoggedUser = $theModelUser->getById($theId);

if(isset($_GET["action"]) && ($_GET["action"] == "editUser")){
  $theUser = array(
    'id' => $theId,
    'oldPassword' => isset($_POST["oldPassword"])? $_POST["oldPassword"]: "",
    'password' => isset($_POST["password"])? $_POST["password"]: "",
    'password2' => isset($_POST["password2"])? $_POST["password2"]: "",
    'name' => isset($_POST["name"])? $_POST["name"]: "",
    'phone' => isset($_POST["phone"])? $_POST["phone"]: "",
    'streetName' => isset($_POST["streetName"])? $_POST["streetName"]: "",
    'apartment' => isset($_POST["apartment"])? $_POST["apartment"]: "",
    'cnp' => isset($_POST["cnp"])? $_POST["cnp"]: "",
    'region' => isset($_POST["region"])? $_POST["region"]: "",
    'city' => isset($_POST["city"])? $_POST["city"]: "",
    'streetNumber' => isset($_POST["streetNumber"])? $_POST["streetNumber"]: ""
  );
  $theHasErrors = false;
  $ErrorList = array(
    'InvalidPasswrod' => false,
    'InvalidPasswrods' => false
  );
  if($theLoggedUser->getPassword() != $theUser['oldPassword']){
    $ErrorList["InvalidPasswrod"] = true;
    $theHasErrors = true;
  }
  if($theUser['password'] != $theUser['password2']){
    $ErrorList["InvalidPasswrods"] = true;
    $theHasErrors = true;
  } 
  
  // verificare daca datele sunt corecte 
  if(!$theHasErrors){
    //insert user in database
    $theModelUser->update($theUser);
    $theUser = $theModelUser->getById($theId);
    //create xml for user
    $theFile = fopen($theRootPath ."/xml/". $theUser->getId() ."Xml.xml", "w") or die("Unable to open file!");
    $txt = '<?xml version="1.0"?>
      <user phone="'.$theUser->getPhone().'" 
            cnp="'.$theUser->getCnp().'" 
            region="'.$theUser->getRegion().'" 
            city="'.$theUser->getCity().'" 
            streetName="'.$theUser->getStreetName().'" 
            streetNumber="'.$theUser->getStreetNumber().'" 
            apartment="'.$theUser->getApartment().'" 
            name="'.$theUser->getName().'" 
            email="'.$theUser->getEmail().'">
      </user>';
    fwrite($theFile, $txt);
    fclose($theFile);
    //send email user
    $theMail = new Mailer();
    $theMail->setTo($theUser->getEmail());
    $theMail->setSubject("Datelii cont");
    $theMail->setMessage("Detalile contului au fost modificate");
    $theMail->SendMail();
    
    $smarty->setSessionNotification('Datele au fost modificate cu succes', "success");
    header("location:index.php");
    return;
  }else{
    $notificationType = "error";
    if($ErrorList['InvalidPasswrod']){
      $notificationMsg .= "Este necesara parola curenta pentru a modifica informatii.<br/>";
    }
    if($ErrorList['InvalidPasswrods']){
      $notificationMsg .= "Parolele nu coincid.<br/>";
    }
    substr($notificationMsg, 0, -5);
    $smarty->setSessionNotification($notificationMsg, "error");
  }
  
}

$smarty->assign("user", $theLoggedUser);
$smarty->assign("notificationMsg", $_SESSION['notificationMsg']);
$smarty->assign("notificationType", $_SESSION['notificationType']);
$smarty->assign("notification", $smarty->fetch("notification.tpl"));
$smarty->clearSessionNotification();

$smarty->assign("errorList", $ErrorList);
$smarty->display("user/edit_user.tpl");
?>