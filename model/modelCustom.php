<?php
loadClassByType("DB", "class");

class modelCustom{
  private static $instance;
  
  public function getDemandsStats(){
    $sql = "select Count(f2.Id) [AcceptedDemands], Count(f3.Id) [RejectedDemands], Count(f4.Id) [PendingDemands], Count(f.Id) [TotalDemands]
            from tbl_form f
            inner join tbl_formtype ft on ft.id = f.formTypeId
            left join tbl_form f2 on f2.id = f.id and f2.status='Accepted'
            left join tbl_form f3 on f3.id = f.id and f3.status='Rejected'
            left join tbl_form f4 on f4.id = f.id and f4.status='Pending'
            where ft.type='c'
            ";
    $rez = sqlsrv_query(DB::getInstance(),$sql);
    if (sqlsrv_has_rows($rez)) {
      return sqlsrv_fetch_array( $rez, SQLSRV_FETCH_ASSOC);
    }
    return null;
  }
  
  public function getComplaintsStats(){
    $sql = "select Count(f2.Id) [ResolvedComplaints], Count(f3.Id) [PendingComplaints], Count(f.Id) [TotalComplaints]
            from tbl_form f
            inner join tbl_formtype ft on ft.id = f.formTypeId
            left join tbl_form f2 on f2.id = f.id and f2.status='Resolved'
            left join tbl_form f3 on f3.id = f.id and f3.status='Pending'
            where ft.type='p'
            ";
    $rez = sqlsrv_query(DB::getInstance(),$sql);
    if (sqlsrv_has_rows($rez)) {
      return sqlsrv_fetch_array( $rez, SQLSRV_FETCH_ASSOC);
    }
    return null;
  }
  
  
}