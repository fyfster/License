<?php
loadClassByType("DB", "class");
loadClassByType("entityForm", "entity");

class modelForm{
  private static $instance;
  private $form;

  public function __construct(){
    $this->form = new entityForm();
  }
  
  public function acceptForm($anId){
    $sql = "UPDATE tbl_form
              SET status = 'Accepted'
              WHERE id = ".$anId;
    $rez = sqlsrv_query(DB::getInstance(),$sql);
  }
  
  public function getAllDocumentsByTypeAndUserId($aFormType, $anUserId){
    $theFormTypeList = array();
    $sql = "SELECT f.*, ft.name [formName], u.name [userName]
      FROM tbl_form f
      INNER JOIN tbl_formtype ft on ft.id = f.formTypeId
      INNER JOIN tbl_user u on u.id = f.userId
      where ft.type = " . $aFormType . " AND f.userId = " . $anUserId;
    $rez = sqlsrv_query(DB::getInstance(), $sql);
    if (sqlsrv_has_rows($rez)) {
      while( $row = sqlsrv_fetch_array( $rez, SQLSRV_FETCH_ASSOC) ) {
        $theFormTypeList[] = $this->toObject($row);
      }
    }
    return $theFormTypeList;
  }

  public function getAllByFilters($anOffset, $aLimit, $aSortColumn, $aSortType, $aColumnFilters, $aSearchValue, $aFormType){
    $theOrderBy = "";
    if($aSortColumn) {
      $theOrderBy = "\r\n ORDER BY " .$aSortColumn. " " .$aSortType;
    } else {
      $theOrderBy = "\r\n ORDER BY f.date ASC"; 
    }
    $theSearchValue = "";
    if($aSearchValue != ""){
      $theSearchValue = " AND (ft.name like '%". $aSearchValue. "%'or 
                  u.name like '%". $aSearchValue. "%')";
    }
    $theSearchFilter = "";
    if(!empty($aColumnFilters)){
      if('' != $aColumnFilters['name']){
        $theSearchFilter .= " AND u.name like '%" . $aColumnFilters['name'] . "%'";
      }
      if('' != $aColumnFilters['startDate']){
        $theSearchFilter .= " AND f.date >= '" . $aColumnFilters['startDate'] . "'
                              AND f.date IS NOT NULL";
      }
      if('' != $aColumnFilters['endDate']){
        $theSearchFilter .= " AND f.date <= '" . $aColumnFilters['endDate'] . "'
                              AND f.date IS NOT NULL";
      }
      if('' != $aColumnFilters['documentType']){
        $theSearchFilter .= " AND ft.id =" . $aColumnFilters['documentType'] . "";
      }
      if('' != $aColumnFilters['status']){
        $theSearchFilter .= " AND f.status ='" . $aColumnFilters['status'] . "'";
      }
      $theOffset = "";
      if($anOffset != null){
        $theOffset = "\r\n OFFSET ".$anOffset." ROWS";
      }
      $theLimit = "";
      if($aLimit != null){
        $theLimit = "\r\n FETCH NEXT ".$aLimit." ROWS ONLY";
      }
    
      $theFormTypeList = array();
      $sql = "SELECT f.*, ft.name [formName], u.username [userName]
        FROM tbl_form f
        INNER JOIN tbl_formtype ft on ft.id = f.formTypeId
        INNER JOIN tbl_user u on u.id = f.userId
        where ft.type = " . $aFormType . $theSearchValue . $theSearchFilter . $theOrderBy . $theOffset . $theLimit;
      $rez = sqlsrv_query(DB::getInstance(), $sql);
      if (sqlsrv_has_rows($rez)) {
        while( $row = sqlsrv_fetch_array( $rez, SQLSRV_FETCH_ASSOC) ) {
          $theFormTypeList[] = $this->toObject($row);
        }
      }
    }
    return $theFormTypeList;
  }

  public function getById($id){
    $sql = "SELECT * FROM tbl_form WHERE id = '{$id}'";
    $rez = sqlsrv_query(DB::getInstance(),$sql);
    if (sqlsrv_has_rows($rez)) {
      $row = sqlsrv_fetch_array( $rez, SQLSRV_FETCH_ASSOC);
      return $this->toObject($row);
    }
    return false;
  }
  
  public function insert($aForm){
    $sql = "INSERT INTO tbl_form (formTypeId, userId, path, date, status) 
            VALUES (". $aForm->getFormTypeId() .", ". $aForm->getUserId() .", '". $aForm->getPath() ."', '". date("Y-m-d") ."', 'Pending')";
    $rez = sqlsrv_query(DB::getInstance(),$sql);
    if (sqlsrv_has_rows($rez)) {
      $row = $rez->fetch_assoc();
      return $row;
    }
    return false;
  }
  
  public function rejectForm($anId, $aMotiv){
    $sql = "UPDATE tbl_form
              SET status = 'Rejected', motiv = '".$aMotiv."'
              WHERE id = ".$anId;
    $rez = sqlsrv_query(DB::getInstance(),$sql);
  }
  
  public function resolveForm($anId){
    $sql = "UPDATE tbl_form
              SET status = 'Resolved'
              WHERE id = ".$anId;
    $rez = sqlsrv_query(DB::getInstance(),$sql);
  }
  
  public function viewForm($anId){
    $sql = "UPDATE tbl_form
              SET viewed = 1
              WHERE id = ".$anId;
    $rez = sqlsrv_query(DB::getInstance(),$sql);
  }
  
  public function toObject(array $row){  
    $theForm = new entityForm();
    $theForm->setId($row['id']);
    $theForm->setFormTypeId($row['formTypeId']);
    $theForm->setPath($row['path']);
    $theForm->setRegisterDate($row['date']);
    $theForm->setUserId($row['userId']);  
    $theForm->setStatus($row['status']);
    $theForm->setMotiv($row['motiv']);
    $theForm->setViewed($row['viewed']);
    if(isset($row['formName'])){
      $theForm->setFormName($row['formName']);
    }
    if(isset($row['userName'])){
      $theForm->setUserName($row['userName']);
    }
    
    return $theForm;
  }
  
}