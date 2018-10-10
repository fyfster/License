<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>{$app_title}</title>
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css" type="text/css">
  <link rel="stylesheet" href="../css/cleanzone.css" type="text/css">
  <link rel="stylesheet" href="../css/jquery.dataTables.css" type="text/css">
  <link rel="stylesheet" href="../css/jquery-ui.css" type="text/css">
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  
  <script src="../js/jquery-1.11.2.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/jquery.datatables.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/chart.js"></script>
</head>
<body>
  <div id="wrap">
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" style="padding: 0px; margin-top: 16px; margin-right: 20px;font-family: Arial; font-weight: lighter; font-size: 22px;">
            {$app_title}
          </a>
        </div>
        <div class="collapse navbar-collapse " id="main-menu">
          <ul class="nav navbar-nav">
            <li><a href='index.php'>Acasa</a></li>
            <li><a href='news.php'>Stiri</a></li>
            {if $authenticated}
              {if $loggedUser['rank'] eq 'citizen'} 
                <li class="btn-group">
                  <a class="dropdown-toggle"  data-toggle="dropdown" href="javascript:;">Cereri<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    {foreach from=$formList key=k item=theForm}
                       {if $theForm->getType() eq 'c'}
                         <li tabindex="-1"><a href="demandForm.php?formTypeId={$theForm->getId()}">{$theForm->getName()}</a></li>
                       {/if}
                    {/foreach}
                  </ul>
                </li>
                <li class="btn-group">
                  <a class="dropdown-toggle"  data-toggle="dropdown" href="javascript:;">Plangeri<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                   {foreach from=$formList key=k item=theForm}
                       {if $theForm->getType() eq 'p'}
                         <li tabindex="-1"><a href="complaintForm.php?formTypeId={$theForm->getId()}">{$theForm->getName()}</a></li>
                       {/if}
                    {/foreach}
                  </ul>
                </li>
                <li><a href='citizenDemandList.php'>Cererile mele</a></li>
                <li><a href='citizenComplaintList.php'>Plangerile mele</a></li>
              {/if}
              
              {if $loggedUser['rank'] eq 'employee'} 
                <li><a href='demandList.php'>Lista cereri</a></li>
                <li><a href='complaintList.php'>Lista plangeri</a></li>
                <li><a href='stats.php'>Statistici</a></li>
              {/if} 
              
              {if $loggedUser['rank'] eq 'admin'} 
                <li><a href='userList.php'>Lista utilizatori</a></li>                                  
              {/if} 
            {/if}
          </ul>
          <ul class="nav navbar-nav navbar-right">
            {if !$authenticated}
            <li class="dropdown" style="display: inline-flex;">
              <a href="index.php?action=login" style="padding-right: 0px; margin-right: 15px;">
                <em class="icon-user"></em>
                <span class="glyphicon glyphicon-user"></span>
                 Logare
              </a>
              <a href="new_user.php">
                 Inscriere
              </a>
            </li>
            {else}
            <li class="btn-group" style="display: inline-flex;">
              <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                <em class="icon-user"></em>
                <span class="glyphicon glyphicon-user"></span>
               {$welcomeUser}
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a tabindex="-1" href="index.php?action=logout">Delogare</a></li>
                <li><a tabindex="-1" href="index.php?action=login">Schimba user</a></li>
                {if $loggedUser['rank'] neq 'admin'} 
                <li><a tabindex="-1" href="edit_user.php?id={$loggedUser['id']}">Modifica cont</a></li>
                {/if}
              </ul>
            </li>
            {/if}
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">