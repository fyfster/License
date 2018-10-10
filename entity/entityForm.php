<?php
  class entityForm {
    private $formTypeId;  
    private $id;
    private $motiv;    
    private $path;
    private $registerDate;
    private $userId;
    private $formName;
    private $status;
    private $userName;
    private $viewed;
    
    public function getFormTypeId(){
      return $this->formTypeId;
    }
    public function getId(){
      return $this->id;
    }
    public function getPath(){
      return $this->path;
    }
    public function getRegisterDate(){
      return $this->registerDate;
    }
    public function getUserId(){
      return $this->userId;
    }
    public function getMotiv(){
      return $this->motiv;
    }
    public function getFormName(){
      return $this->formName;
    }
    public function getUserName(){
      return $this->userName;
    }
    public function getStatus(){
      return $this->status;
    }
    public function getViewed(){
      return $this->viewed;
    }

    
    public function setFormTypeId($aFormTypeId){
      $this->formTypeId = $aFormTypeId;
    }
    public function setId($anId){
      $this->id = $anId;
    }
    public function setPath($apath){
      $this->path = $apath;
    }
    public function setRegisterDate($aRegisterDate){
      $this->registerDate = $aRegisterDate;
    }
    public function setUserId($anUserId){
      $this->userId = $anUserId;
    }
    public function setFormName($aFormName){
      $this->formName = $aFormName;
    }
    public function setUserName($anUserName){
      $this->userName = $anUserName;
    }
    public function setMotiv($aMotiv){
      $this->motiv = $aMotiv;
    }
    public function setStatus($aStatus){
      $this->status = $aStatus;
    }
    public function setViewed($aViewed){
      $this->viewed = $aViewed;
    }
  }
?>