<?php /* Smarty version Smarty-3.1.13, created on 2015-04-22 18:24:40
         compiled from "D:\Facultate\Proiect\Licenta\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18845537bd3812a6e9-92856754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9479934a9544ae5f054dcc8b80f1a91e9f8b799d' => 
    array (
      0 => 'D:\\Facultate\\Proiect\\Licenta\\templates\\header.tpl',
      1 => 1429689526,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18845537bd3812a6e9-92856754',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_title' => 0,
    'authenticated' => 0,
    'loggedUser' => 0,
    'welcomeUser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5537bd3819fa06_71337418',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5537bd3819fa06_71337418')) {function content_5537bd3819fa06_71337418($_smarty_tpl) {?><!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title><?php echo $_smarty_tpl->tpl_vars['app_title']->value;?>
</title>
  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css" type="text/css">
  <link rel="stylesheet" href="../css/cleanzone.css" type="text/css">
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <script src="../js/jquery-1.11.2.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/bootstrap.min.js"></script>
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
            <li><a href='javascript:;'>FAQ</a></li>
            <?php if ($_smarty_tpl->tpl_vars['authenticated']->value){?>
              <?php if ($_smarty_tpl->tpl_vars['loggedUser']->value['rank']=='employee'){?> 
                <li><a href='demandList.php'>Lista cereri</a></li>
                <li><a href='javascript:;'>Lista plangeri</a></li>
              <?php }?> 
              <?php if ($_smarty_tpl->tpl_vars['loggedUser']->value['rank']=='citizen'){?> 
                <li class="btn-group">
                  <a class="dropdown-toggle"  data-toggle="dropdown" href="javascript:;">Cereri<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li tabindex="-1"><a href="form.php?id=1">Cerere autorizare comert stradal temporar</a></li>
                    <li tabindex="-1"><a href="javascript:;">Cerere solicitare ingrijitor la domiciliu</a></li>
                    <li tabindex="-1"><a href="javascript:;">Cerere de inscriere mentiune casatorie si deces inregistrate in strainatate</a></li>
                    <li tabindex="-1"><a href="javascript:;">Cerere de inregistrare tardiva a nasterii</a></li>                                        
                  </ul>
                </li>
                <li class="btn-group">
                  <a class="dropdown-toggle"  data-toggle="dropdown" href="javascript:;">Plangeri<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li tabindex="-1"><a href="javascript:;">Catre autoritatea nastionala de supravechere a datelor personale</a></li>
                    <li tabindex="-1"><a href="javascript:;">Catre Primaria orasului-responsabila cu autorizarea punctelor de lucru si a sediului caselor de schimb valutar</a></li>
                  </ul>
                </li>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['loggedUser']->value['rank']=='admin'){?> 
                <li><a href='javascript:;'>Useri</a></li>                                  
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
              <a href="index.php?action=signIn">
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
            <script>
              $('.dropdown-toggle').click(function(){
                $(this).parent().addClass('open');
              });
            </script>
            <?php }?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container"><?php }} ?>