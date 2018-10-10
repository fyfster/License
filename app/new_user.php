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

if(isset($_GET["action"]) && ($_GET["action"] == "createUser")){
  $theUser = array(
    'username' => isset($_POST["username"])? $_POST["username"]: "",
    'password' => isset($_POST["password"])? $_POST["password"]: "",
    'password2' => isset($_POST["password2"])? $_POST["password2"]: "",
    'email' => isset($_POST["email"])? $_POST["email"]: "",
    'name' => isset($_POST["name"])? $_POST["name"]: "",
    'phone' => isset($_POST["phone"])? $_POST["phone"]: "",
    'streetName' => isset($_POST["streetName"])? $_POST["streetName"]: "",
    'apartment' => isset($_POST["apartment"])? $_POST["apartment"]: "",
    'cnp' => isset($_POST["cnp"])? $_POST["cnp"]: "",
    'region' => isset($_POST["region"])? $_POST["region"]: "",
    'city' => isset($_POST["city"])? $_POST["city"]: "",
    'streetNumber' => isset($_POST["streetNumber"])? $_POST["streetNumber"]: ""
  );
  $theModelUser = new modelUser();
  $theHasErrors = false;
  $ErrorList = array(
    'Mandatory' => false,
    'InvalidUsername' => false,
    'InvalidPasswrods' => false,
  );
  if( ("" == $theUser['username']) || ("" == $theUser['email']) || ("" == $theUser['password']) || ("" == $theUser['password2']) ){
    $ErrorList["Mandatory"] = true;
    $theHasErrors = true;
  } else {
    if($theModelUser->checkIfUsernameValid($theUser['username']) == false) {
      $ErrorList["InvalidUsername"] = true;
      $theHasErrors = true;
    }
    if($theUser['password'] != $theUser['password2']){
      $ErrorList["InvalidPasswrods"] = true;
      $theHasErrors = true;
    }
  } 
  
  // verificare daca datele sunt corecte 
  if(!$theHasErrors){
    //insert user in database
    $theInsertedUser = $theModelUser->insert($theUser);
    $theUser = $theModelUser->getById($theInsertedUser['id']);
    //create xml for user
    $theFile = fopen($theRootPath ."/xml/". $theInsertedUser['id'] ."Xml.xml", "w") or die("Unable to open file!");
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
    $theMail->setSubject("Account created");
    $theMail->setMessage("Welcome ". $theUser->getName());
    $theMail->SendMail();
    
    $smarty->setSessionNotification('Utilizatorul a fost intregistrat', "success");
    header("location:index.php");
    return;
  }else{
    $notificationType = "error";
    if($ErrorList['Mandatory']){
      $notificationMsg .= "Toate informatiile din panoul pprincipal sunt obligatorii.<br/>";
    }
    if($ErrorList['InvalidUsername']){
      $notificationMsg .= "Utilizatorul este deja folosit.<br/>";
    }
    if($ErrorList['InvalidPasswrods']){
      $notificationMsg .= "Parolele nu coincid.<br/>";
    }
    substr($notificationMsg, 0, -5);
    $smarty->setSessionNotification($notificationMsg, "error");
  }
  
}
$smarty->assign("notificationMsg", $_SESSION['notificationMsg']);
$smarty->assign("notificationType", $_SESSION['notificationType']);
$smarty->assign("notification", $smarty->fetch("notification.tpl"));
$smarty->clearSessionNotification();
$smarty->assign("user", $theUser);
$smarty->assign("errorList", $ErrorList);
$smarty->display("user/new_user.tpl");
?>