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
    case "viewDemand":
      $theId = isset($_GET["id"])? intval($_GET["id"]) : 0;
      $theModelForm->viewForm($theId);
      return;
      break;
      
    case "acceptDemand":
      $theId = isset($_GET["id"])? intval($_GET["id"]) : 0;
      if(0 == $theId){
        $smarty->setSessionNotification('Cererea aleasa este invalida', "error");
        header("location:demandList.php");
        return;
      }
      $theFormEntity = $theModelForm->getById($theId);
      if(!$theFormEntity->getViewed()){
        $smarty->setSessionNotification('O cerere nevizualizata nu poate fi acceptata.', "error");
        header("location:demandList.php");
        return;
      }
      $theModelForm->acceptForm($theId);
      //send email user
      loadClassByType("modelUser", "model");
      $theModelUser = new modelUser();
      $theUser = $theModelUser->getById($theFormEntity->getUserId());
      $theMail = new Mailer();
      $theMail->setTo($theUser->getEmail());
      $theMail->setSubject("Actualizare fisiere");
      $theMail->setMessage("Buna ziua ". $theUser->getUsername() ."
Cererea dumneavoastra a fost acceptata
Pentru mai multe detalii vizualizati optiunea 'Cererile mele' din site ");
      $theMail->SendMail();
      
      $smarty->setSessionNotification('Cererea a fost acceptata.', "success");
      header("location:demandList.php");
      return;  
      break;
      
    case "rejectDemand":
      $theId = isset($_GET["id"])? intval($_GET["id"]) : 0;
      if(0 == $theId){
        $smarty->setSessionNotification('Cererea aleasa este invalida', "error");
        header("location:demandList.php");
        return;
      }
      $theFormEntity = $theModelForm->getById($theId);
      if(!$theFormEntity->getViewed()){
        $smarty->setSessionNotification('O cerere nevizualizata nu opate fi respinsa.', "error");
        header("location:demandList.php");
        return;
      }
      $theMotiv = isset($_GET['motiv'])? $_GET['motiv'] : "";
      $theModelForm->rejectForm($theId, $theMotiv);
      //send email user
      loadClassByType("modelUser", "model");
      $theModelUser = new modelUser();
      $theUser = $theModelUser->getById($theFormEntity->getUserId());
      $theMail = new Mailer();
      $theMail->setTo($theUser->getEmail());
      $theMail->setSubject("Actualizare fisiere");
      $theMail->setMessage("Buna ziua ". $theUser->getUsername() ."
Cererea dumneavoastra a fost respinsa
Pentru mai multe detalii vizualizati optiunea 'Cererile mele' din site ");
      $theMail->SendMail();
      
      $smarty->setSessionNotification('Cererea a fost respinsa.', "success");
      header("location:demandList.php");
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
      $theTableData = $theModelForm->getAllByFilters($theOffset, $theLimit, $theSortColumn, $theSortType, $_POST['filter'], $_POST["sSearch"], "'c'");
      $theResponse = new \stdClass();
      $theResponse->sEcho = $_POST["sEcho"];
      $theResponse->iTotalRecords = count($theModelForm->getAllByFilters(null, null, $theSortColumn, $theSortType, $_POST['filter'], $_POST["sSearch"], "'c'"));
      $theResponse->iTotalDisplayRecords = count($theModelForm->getAllByFilters(null, null, $theSortColumn, $theSortType, $_POST['filter'], $_POST["sSearch"], "'c'"));
      $theResponse->aaData = array();
      foreach ($theTableData as $AData) {
        $registerDate = ($AData->getRegisterDate()!= null ) ?  date_format($AData->getRegisterDate(), 'd/m/Y') : "";
        $status = "";
        $disabled = "";
        switch($AData->getStatus()){
          case "Accepted":
            $status= "<span style='color: green;'>Acceptat<span>";
            $disabled= " disabled";
            break;
          case "Rejected":
            $status= "<span style='color: red;'>Respins<span>";
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
        "<a class='btn btn-sm ".$theBtnClass." downloadBtn' data-id='".$AData->getId()."' href='../". $AData->getPath() ."' download>Descarca cerere</a>
         <a class='btn btn-sm btn-primary' $disabled href='demandList.php?action=acceptDemand&id=".$AData->getId()."'>
           <span class='glyphicon glyphicon-ok'></span>
         </a>
         <a class='btn btn-sm btn-primary rejectBtn' $disabled data-toggle='modal' data-target='#rejectModal' data-id='".$AData->getId()."' data-url='demandList.php?action=rejectDemand&id='>
           <span class='glyphicon glyphicon-remove'></span>
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
$smarty->display("demandList.tpl");
?>


