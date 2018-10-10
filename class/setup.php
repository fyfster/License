<?php
require_once ("/../config.php");
require_once('/../libs/Smarty.class.php');
loadClassbyType("AuthService", "class");

class UserSmarty extends Smarty{
  public function __construct(){
    parent::__construct();
    $this->setTemplateDir(dirname(__FILE__) . "/../templates/");
    $this->setCompileDir(dirname(__FILE__) . "/../templates_c/");
    $this->setConfigDir(dirname(__FILE__) . "/../configs/");
    $this->setCacheDir(dirname(__FILE__) . "/../cache/");
    $this->setPluginsDir(dirname(__FILE__) . "/../plugins/");
    $this->force_compile = true;
    
    if(AuthService::getInstance()->isAuthenticated()){
      $theLoggedUser = AuthService::getInstance()->getLoggedUser();
      $this->assign("welcomeUser", "Welcome, " . $theLoggedUser['username']);
      loadClassByType("modelFormType", "model");
      $theModelFormType = new modelFormType();
      if('citizen' == $theLoggedUser['rank']){
        $theFormList = $theModelFormType->getAll();
        $this->assign("formList", $theFormList);
      }
    } else {
      $this->assign("isLoggedIn", false);
    }
    $this->assign("projectPath", dirname(__FILE__). "\..\\");
    $this->assign("app_title", "Primos");
    $this->assign("siteURL", siteURL);
    $this->assign("authenticated", AuthService::getInstance()->isAuthenticated());
    $this->assign("loggedUser", AuthService::getInstance()->getLoggedUser());
    $this->assign("header", $this->fetch("header.tpl"));
    $this->assign("footer", $this->fetch("footer.tpl"));
  }
  
  public function setSessionNotification($aNotificationMsg, $aNotificationType){
    $_SESSION['notificationMsg'] = $aNotificationMsg;
    $_SESSION['notificationType'] = $aNotificationType;
  }
  public function clearSessionNotification(){
    $_SESSION['notificationMsg'] = '';
    $_SESSION['notificationType'] = '';
  }
}
