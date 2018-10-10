<?php /* Smarty version Smarty-3.1.13, created on 2015-06-18 21:14:18
         compiled from "D:\Proiect\Licenta\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3240455830a7acc7fa4-78625404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab78709f8aa22a641bde645f11c0ad8561d26fb6' => 
    array (
      0 => 'D:\\Proiect\\Licenta\\templates\\header.tpl',
      1 => 1434399883,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3240455830a7acc7fa4-78625404',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_title' => 0,
    'authenticated' => 0,
    'loggedUser' => 0,
    'formList' => 0,
    'theForm' => 0,
    'welcomeUser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55830a7adc0c04_00596785',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55830a7adc0c04_00596785')) {function content_55830a7adc0c04_00596785($_smarty_tpl) {?><!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title><?php echo $_smarty_tpl->tpl_vars['app_title']->value;?>
</title>
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
            <?php echo $_smarty_tpl->tpl_vars['app_title']->value;?>

          </a>
        </div>
        <div class="collapse navbar-collapse " id="main-menu">
          <ul class="nav navbar-nav">
            <li><a href='index.php'>Acasa</a></li>
            <li><a href='javascript:;'>Stiri</a></li>
            <?php if ($_smarty_tpl->tpl_vars['authenticated']->value){?>
              <?php if ($_smarty_tpl->tpl_vars['loggedUser']->value['rank']=='citizen'){?> 
                <li class="btn-group">
                  <a class="dropdown-toggle"  data-toggle="dropdown" href="javascript:;">Cereri<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php  $_smarty_tpl->tpl_vars['theForm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theForm']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theForm']->key => $_smarty_tpl->tpl_vars['theForm']->value){
$_smarty_tpl->tpl_vars['theForm']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['theForm']->key;
?>
                       <?php if ($_smarty_tpl->tpl_vars['theForm']->value->getType()=='c'){?>
                         <li tabindex="-1"><a href="demandForm.php?formTypeId=<?php echo $_smarty_tpl->tpl_vars['theForm']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['theForm']->value->getName();?>
</a></li>
                       <?php }?>
                    <?php } ?>
                  </ul>
                </li>
                <li class="btn-group">
                  <a class="dropdown-toggle"  data-toggle="dropdown" href="javascript:;">Plangeri<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                   <?php  $_smarty_tpl->tpl_vars['theForm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theForm']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theForm']->key => $_smarty_tpl->tpl_vars['theForm']->value){
$_smarty_tpl->tpl_vars['theForm']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['theForm']->key;
?>
                       <?php if ($_smarty_tpl->tpl_vars['theForm']->value->getType()=='p'){?>
                         <li tabindex="-1"><a href="complaintForm.php?formTypeId=<?php echo $_smarty_tpl->tpl_vars['theForm']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['theForm']->value->getName();?>
</a></li>
                       <?php }?>
                    <?php } ?>
                  </ul>
                </li>
                <li><a href='citizenDemandList.php'>Cererile mele</a></li>
                <li><a href='citizenComplaintList.php'>Plangerile mele</a></li>
              <?php }?>
              
              <?php if ($_smarty_tpl->tpl_vars['loggedUser']->value['rank']=='employee'){?> 
                <li><a href='demandList.php'>Lista cereri</a></li>
                <li><a href='complaintList.php'>Lista plangeri</a></li>
                <li><a href='stats.php'>Statistici</a></li>
              <?php }?> 
              
              <?php if ($_smarty_tpl->tpl_vars['loggedUser']->value['rank']=='admin'){?> 
                <li><a href='userList.php'>Lista utilizatori</a></li>                                  
              <?php }?> 
            <?php }?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if (!$_smarty_tpl->tpl_vars['authenticated']->value){?>
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
            <?php }else{ ?>
            <li class="btn-group" style="display: inline-flex;">
              <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                <em class="icon-user"></em>
                <span class="glyphicon glyphicon-user"></span>
               <?php echo $_smarty_tpl->tpl_vars['welcomeUser']->value;?>

                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a tabindex="-1" href="index.php?action=logout">Delogare</a></li>
                <li><a tabindex="-1" href="index.php?action=login">Schimba user</a></li>
              </ul>
            </li>
            <?php }?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container"><?php }} ?>