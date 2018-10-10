<?php
loadClassByType("DB", "class");
loadClassByType("entityFormType", "entity");

class modelFormType{
  private static $instance;
  private $formType;

  public function __construct(){
    $this->formType = new entityFormType();
  }

  public function getAll(){
    $theFormType = array();
    $sql = "SELECT * FROM tbl_formtype";
    $rez = sqlsrv_query(DB::getInstance(),$sql);
    if (sqlsrv_has_rows($rez)) {
      while( $row = sqlsrv_fetch_array( $rez, SQLSRV_FETCH_ASSOC) ) {
       $theFormType[] = $this->toObject($row);
      }
    }
    return $theFormType;
  }

  public function getById($id){
    $sql = "SELECT * FROM tbl_formtype WHERE id = '{$id}'";
    $rez = sqlsrv_query(DB::getInstance(),$sql);
    if (sqlsrv_has_rows($rez)) {
      $row = sqlsrv_fetch_array( $rez, SQLSRV_FETCH_ASSOC);
      return $this->toObject($row);
    }
    return false;
  }
  
  public function toObject(array $row){  
    $theFormType = new entityFormType();
    $theFormType->setId($row['id']);
    $theFormType->setName($row['name']);    
    $theFormType->setType($row['type']);
    
    return $theFormType;
  }
  
}