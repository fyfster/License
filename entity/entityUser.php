<?php
  class entityUser {
    private $apartment;
    private $city;
    private $cnp;
    private $email;
    private $id;
    private $name;
    private $password;
    private $phone;
    private $rank;
    private $region;
    private $streetName;
    private $streetNumber;
    private $username;
    
    public function getApartment(){
      return $this->apartment;
    }
    public function getCity(){
      return $this->city;
    }
    public function getCnp(){
      return $this->cnp;
    }
    public function getEmail(){
      return $this->email;
    }
    public function getId(){
      return $this->id;
    }
    public function getName(){
      return $this->name;
    }
    public function getPassword(){
      return $this->password;
    }
    public function getPhone(){
      return $this->phone;
    }
    public function getRank(){
      return $this->rank;
    }
    public function getRegion(){
      return $this->region;
    }
    public function getStreetName(){
      return $this->streetName;
    }
    public function getStreetNumber(){
      return $this->streetNumber;
    }
    public function getUsername(){
      return $this->username;
    }

    public function setApartment($anApartment){
      $this->apartment = $anApartment;
    }
    public function setCity($aCity){
      $this->city = $aCity;
    }
    public function setCnp($aCnp){
      $this->cnp = $aCnp;
    }
    public function setEmail($anEmail){
      $this->email = $anEmail;
    }
    public function setId($anId){
      $this->id = $anId;
    }
    public function setName($aName){
      $this->name = $aName;
    }
    public function setPassword($aPassword){
      $this->password = $aPassword;
    }
    public function setPhone($aPhone){
      $this->phone = $aPhone;
    }
    public function setRank($aRank){
      $this->rank = $aRank;
    }
    public function setRegion($aRegion){
      $this->region = $aRegion;
    }
    public function setStreetName($aStreetName){
      $this->streetName = $aStreetName;
    }
    public function setStreetNumber($aStreetNumber){
      $this->streetNumber = $aStreetNumber;
    }
    public function setUsername($aUsername){
      $this->username = $aUsername;
    }
  }
?>