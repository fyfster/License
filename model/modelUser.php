<?php
loadClassByType("DB", "class");
loadClassByType("entityUser", "entity");

class modelUser{
  private static $instance;
  private $user;

  public function __construct(){
    $this->user = new entityUser();
  }
  
  public function checkIfUsernameValid($anUsername){
    $sql = "SELECT * FROM tbl_user WHERE username = '$anUsername'";
    $rez = sqlsrv_query(DB::getInstance(),$sql);
    if (sqlsrv_has_rows($rez)) {
      return false;
    }
    return true;
  }
  
  public function getAll(){
    $users = array();
    $sql = "SELECT * FROM users";
    $rez = sqlsrv_query(DB::getInstance(), $sql);
    if (sqlsrv_has_rows($rez)) {
      while( $row = sqlsrv_fetch_array( $rez, SQLSRV_FETCH_ASSOC) ) {
       $users[] = $this->userAdapter->toViewType($row);
      }
    }
    return $users;
  }
  
  public function getAllByFilters($anOffset, $aLimit, $aSortColumn, $aSortType, $aColumnFilters, $aSearchValue){
    $theOrderBy = "";
    if($aSortColumn) {
      $theOrderBy = "\r\n ORDER BY " .$aSortColumn. " " .$aSortType;
    }
    $theSearchValue = "";
    if($aSearchValue != ""){
      $theSearchValue = " AND (u.username like '%". $aSearchValue. "%')";
    }
    $theSearchFilter = "";
    if(!empty($aColumnFilters)){
      if('' != $aColumnFilters['name']){
        $theSearchFilter .= " AND u.username like '%" . $aColumnFilters['name'] . "%'";
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
      $sql = "SELECT u.id [userId], u.username [userName], 
                     case when rank = 'citizen' then 1 else 0 end isCitizen,
                     case when rank = 'employee' then 1 else 0 end isEmployee
        FROM tbl_user u
        WHERE ((u.rank = 'employee') OR (u.rank = 'citizen'))" . $theSearchValue . $theSearchFilter . $theOrderBy . $theOffset . $theLimit;
      $rez = sqlsrv_query(DB::getInstance(), $sql);
      if (sqlsrv_has_rows($rez)) {
        $theUser = array();
        while( $row = sqlsrv_fetch_array( $rez, SQLSRV_FETCH_ASSOC) ) {
          $theUser[] = $row;
        }
        return $theUser;
      }
    }
    return null;
  }

  public function getById($anId)
  {
    $sql = "SELECT * FROM tbl_user WHERE id = $anId";
    $rez = sqlsrv_query(DB::getInstance(),$sql);
    if (sqlsrv_has_rows($rez)) {
      $row = sqlsrv_fetch_array( $rez, SQLSRV_FETCH_ASSOC);
      return $this->toObject($row);
    }
    return false;
  }
  
  public function isCitizen($anId)
  {
    $sql = "UPDATE tbl_user
              SET rank = 'citizen'
              WHERE id = ".$anId;
    $rez = sqlsrv_query(DB::getInstance(),$sql);
  }
  
  public function isEmployee($anId)
  {
    $sql = "UPDATE tbl_user
              SET rank = 'employee'
              WHERE id = ".$anId;
    $rez = sqlsrv_query(DB::getInstance(),$sql);
  }
  
  public function getUserByUsernameAndPass($anUsername, $aPassword){
    $theQuery = "SELECT * FROM tbl_user WHERE username= '". $anUsername ."' AND password= '". $aPassword ."'";
    $rez = sqlsrv_query(DB::getInstance(), $theQuery);
    $theUser= array();
    if (sqlsrv_has_rows($rez)) {
      while( $row = sqlsrv_fetch_array( $rez, SQLSRV_FETCH_ASSOC) ) {
        $theUser = $this->toObject($row);
      }
      return $theUser;
    } 
    return false;
  }
  
  public function insert($anUserArray){
    $theQuery = "INSERT INTO tbl_user (username, password, email, name, rank, cnp, streetName, streetNumber, apartment, phone, city) 
                 VALUES ('".$anUserArray['username']."', '".$anUserArray['password']."', '".$anUserArray['email']."', '".$anUserArray['name']."', 'citizen', '".$anUserArray['cnp']."',
                          '".$anUserArray['streetName']."', '".$anUserArray['streetNumber']."', '".$anUserArray['apartment']."', '".$anUserArray['phone']."', '".$anUserArray['city']."')";
    sqlsrv_query(DB::getInstance(),$theQuery);
    $rez = sqlsrv_query(DB::getInstance(),"SELECT SCOPE_IDENTITY() as id ;");
    if (sqlsrv_has_rows($rez)) {
      $row = sqlsrv_fetch_array( $rez, SQLSRV_FETCH_ASSOC);
      return $row;
    }
    return false;
  }
  
  public function update($anUserArray){
    $theNewPassword = "";
    if($anUserArray['password'] != ""){
      $theNewPassword = "password = '" .$anUserArray['password']."', ";
    }
    $theQuery = "UPDATE tbl_user  
                 SET
                    name = '". $anUserArray['name'] ."', 
                    ". $theNewPassword."
                    cnp = '".$anUserArray['cnp']. "', 
                    streetName = '". $anUserArray['streetName'] ."',
                    streetNumber = '". $anUserArray['streetNumber'] ."',
                    apartment = '". $anUserArray['apartment'] ."',
                    phone = '". $anUserArray['phone'] ."', 
                    city = '". $anUserArray['city'] ."'
                 WHERE id = ". $anUserArray['id'];

    sqlsrv_query(DB::getInstance(),$theQuery);
  }
  
  public function toObject(array $row){  
    $user = new entityUser();
    $user->setApartment($row['apartment']);
    $user->setCnp($row['cnp']);
    $user->setCity($row['city']);
    $user->setEmail($row['email']);
    $user->setId($row['id']);
    $user->setName($row['name']);
    $user->setPassword($row['password']);
    $user->setPhone($row['phone']);
    $user->setRank($row['rank']);
    $user->setRegion($row['region']);
    $user->setStreetName($row['streetName']);
    $user->setStreetNumber($row['streetNumber']);    
    $user->setUsername($row['username']);
    
    return $user;
  }
}