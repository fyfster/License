<?php
  class DB{
    private static $sqlInstance;

    private function __construct(){
    }

    public static function getInstance(){
      if (is_null(self::$sqlInstance)) {
        $connectionInfo = array( "Database"=>DB_Database, "UID"=>DB_UID, "PWD"=>DB_PWD);
        self::$sqlInstance = sqlsrv_connect(DB_HOST, $connectionInfo);
      }
      return self::$sqlInstance;
    }
  }
?>