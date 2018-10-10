<?php
require_once '../config.php';
require_once $setupPath;
loadClassByType("mailer", "class");
loadClassByType("AuthService", "class");
loadClassByType("modelForm", "model");
loadClassByType("modelFormType", "model");
$smarty = new UserSmarty();
if(!AuthService::getInstance()->isAuthenticated()){
  header("location:index.php");  
}
$theModelForm = new modelForm();
$theModelFormType = new modelFormType();
$theFormTypeList= $theModelFormType->getAll();
$smarty->assign("formTypeList", $theFormTypeList);
if(isset($_GET["action"])){
  switch($_GET["action"]){
    case "viewComplaint":
      $theId = isset($_GET["id"])? intval($_GET["id"]) : 0;
      $theModelForm->viewForm($theId);
      return;
      break;
      
    case "resolveComplaint":
      $theId = isset($_GET["id"])? intval($_GET["id"]) : 0;
      if(0 == $theId){
        $smarty->setSessionNotification('Plangerea aleasa este invalida', "error");
        header("location:complaintList.php");
        return;
      }
      $theFormEntity = $theModelForm->getById($theId);
      if(!$theFormEntity->getViewed()){
        $smarty->setSessionNotification('O plangere nevizualizata nu poate fi rezolvata.', "error");
        header("location:complaintList.php");
        return;
      }
      $theModelForm->resolveForm($theId);
      //send email user
      loadClassByType("modelUser", "model");
      $theModelUser = new modelUser();
      $theUser = $theModelUser->getById($theFormEntity->getUserId());
      $theMail = new Mailer();
      $theMail->setTo($theUser->getEmail());
      $theMail->setSubject("Actualizare fisiere");
      $theMail->setMessage("Buna ziua ". $theUser->getUsername() ."
Plangerea dumneavoastra a fost rezolvata
Pentru mai multe detalii vizualizati optiunea 'Plangerile mele' din site ");
      $theMail->SendMail();
      
      $smarty->setSessionNotification('Plangerea a fost rezolvata.', "success");
      header("location:complaintList.php");
      return;  
      break;

    case "getData":
      $theSortType = ($_POST["sSortDir_0"] == "asc")? "ASC" : "DESC";
      
      $theColumns = array(
        "0" => "u.name",
        "1" => "ft.name",
        "2" => "f.date"
      );
      $theSortColumn = isset($theColumns[$_POST["iSortCol_0"]]) ? $theColumns[$_POST["iSortCol_0"]]: false;
      
      $theOffset = $_POST["iDisplayStart"];
      $theLimit = $_POST["iDisplayLength"];
      $theTableData = $theModelForm->getAllByFilters($theOffset, $theLimit, $theSortColumn, $theSortType, $_POST['filter'], $_POST["sSearch"], "'p'");
      $theResponse = new \stdClass();
      $theResponse->sEcho = $_POST["sEcho"];
      $theResponse->iTotalRecords = count($theModelForm->getAllByFilters(null, null, $theSortColumn, $theSortType, $_POST['filter'], $_POST["sSearch"], "'p'"));
      $theResponse->iTotalDisplayRecords = count($theModelForm->getAllByFilters(null, null, $theSortColumn, $theSortType, $_POST['filter'], $_POST["sSearch"], "'p'"));
      $theResponse->aaData = array();
      foreach ($theTableData as $AData) {
        $registerDate = ($AData->getRegisterDate()!= null ) ?  date_format($AData->getRegisterDate(), 'd/m/Y') : "";
        $status = "";
        $disabled = "";
        switch($AData->getStatus()){
          case "Resolved":
            $status= "<span style='color: green;'>Resolvata<span>";
            $disabled= " disabled";
            break;
          default :
            $status= "<span>In curs de procesare<span>";
            break;  
        }
        $theBtnClass = 'btn-primary';
        if($AData->getViewed()){
          $theBtnClass = 'btn-success';
        }
        $theResponse->aaData[] = (object)array(
        $AData->getUserName(),
        $AData->getFormName(),
        $registerDate,
        $status,
        "<a class='btn btn-sm ".$theBtnClass." downloadBtn' data-id='".$AData->getId()."' href='../". $AData->getPath() ."' download>Descarca plangere</a>
         <a class='btn btn-sm btn-primary' $disabled href='complaintList.php?action=resolveComplaint&id=".$AData->getId()."'>
           <span class='glyphicon glyphicon-ok'></span>
         </a>"
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
$smarty->display("complaintList.tpl");
?>


