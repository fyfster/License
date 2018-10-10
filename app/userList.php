<?php
require_once '../config.php';
require_once $setupPath;
loadClassByType("AuthService", "class");
loadClassByType("modelUser", "model");
$smarty = new UserSmarty();
if(!AuthService::getInstance()->isAuthenticated()){
  header("location:index.php");  
}
$theModelUser = new modelUser();
if(isset($_GET["action"])){
  switch($_GET["action"]){
    case "isCitizen":
      $theId = isset($_GET["id"])? intval($_GET["id"]) : 0;
      $theModelUser->isCitizen($theId);
      return;  
      break;
      
    case "isEmployee":
      $theId = isset($_GET["id"])? intval($_GET["id"]) : 0;
      $theModelUser->isEmployee($theId);
      return;  
      break;
      
    case "getData":
      $theSortType = ($_POST["sSortDir_0"] == "asc")? "ASC" : "DESC";
      
      $theColumns = array(
        "0" => "u.username"
      );
      $theSortColumn = isset($theColumns[$_POST["iSortCol_0"]]) ? $theColumns[$_POST["iSortCol_0"]]: false;
      
      $theOffset = $_POST["iDisplayStart"];
      $theLimit = $_POST["iDisplayLength"];
      $theTableData = $theModelUser->getAllByFilters($theOffset, $theLimit, $theSortColumn, $theSortType, $_POST['filter'], $_POST["sSearch"]);
      $theResponse = new \stdClass();
      $theResponse->sEcho = $_POST["sEcho"];
      $theResponse->iTotalRecords = count($theModelUser->getAllByFilters(null, null, $theSortColumn, $theSortType, $_POST['filter'], $_POST["sSearch"]));
      $theResponse->iTotalDisplayRecords = count($theModelUser->getAllByFilters(null, null, $theSortColumn, $theSortType, $_POST['filter'], $_POST["sSearch"]));
      $theResponse->aaData = array();
      foreach ($theTableData as $AData) {
        $isCitizen = ($AData['isCitizen'] == 1)? "checked": "";
        $isEmployee = ($AData['isEmployee'] == 1)? "checked": "";
        $theBtnClass = 'btn-primary';
        
        $theResponse->aaData[] = (object)array(
        $AData['userName'],
        "<span class='input-group-addon'>
           <input type='radio' data-id='".$AData['userId']."' class='isCitizen' ".$isCitizen." aria-label='...'>
         </span>",
         "<span class='input-group-addon'>
           <input type='radio' data-id='".$AData['userId']."' class='isEmployee' ".$isEmployee." aria-label='...'>
         </span>"
      );
      
    }
    echo(json_encode($theResponse));
    return;
  }
}

$smarty->assign("notificationMsg", $_SESSION['notificationMsg']);
$smarty->assign("notificationType", $_SESSION['notificationType']);
$smarty->assign("notification", $smarty->fetch("notification.tpl"));
$smarty->clearSessionNotification();
$smarty->display("userList.tpl");
?>


