<?php
loadClassByType("DB", "class");
loadClassByType("entityUser", "entity");
loadClassByType("modelUser", "model");

class AuthService{
  private static $instance;
  private $user;

  public function __construct(){
    $this->user = new entityUser();
  }

  public static function getInstance(){
    if (is_null(self::$instance)) {
        self::$instance = new AuthService();
    }
    return self::$instance;
  }

  public function login($anUsername, $aPassword){
    $theUserModel = new modelUser();
    $theUser = $theUserModel->getUserByUsernameAndPass($anUsername, $aPassword);
    if(!empty($theUser)){
      $_SESSION['user']['id'] = $theUser->getId();
      $_SESSION['user']['name'] = $theUser->getName();
      $_SESSION['user']['rank'] = $theUser->getRank();
      $_SESSION['user']['username'] = $theUser->getUsername();
      $_SESSION['user']['email'] = $theUser->getEmail();
    }
    return $theUser;
  }

  public function logout(){
    session_destroy();
  }

  public function isAuthenticated(){
    return isset($_SESSION['user']);
  }

  public function getLoggedUser(){
    if (isset($_SESSION['user'])){
      return $_SESSION['user'];
    }
    else {
      return null;
    }
  }
}