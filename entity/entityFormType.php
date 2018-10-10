<?php
  class entityFormType {
    private $id;
    private $type;
    private $name;
    private $shortName;

    public function getId(){
      return $this->id;
    }
    public function getType(){
      return $this->type;
    }
    public function getName(){
      return $this->name;
    }
    public function getShortName(){
      return $this->shortName;
    }

    public function setId($anId){
      $this->id = $anId;
    }
    public function setType($aType){
      $this->type = $aType;
    }
    public function setName($aName){
      $this->name = $aName;
    }
    public function setShortName($aShortName){
      $this->shortName = $aShortName;
    }
  }
?>