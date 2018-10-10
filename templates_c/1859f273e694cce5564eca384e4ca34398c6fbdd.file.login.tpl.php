<?php /* Smarty version Smarty-3.1.13, created on 2015-04-22 18:23:03
         compiled from "D:\Facultate\Proiect\Licenta\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135135537bcd751ff98-70046133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1859f273e694cce5564eca384e4ca34398c6fbdd' => 
    array (
      0 => 'D:\\Facultate\\Proiect\\Licenta\\templates\\login.tpl',
      1 => 1429447688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135135537bcd751ff98-70046133',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5537bcd7527c91_06047340',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5537bcd7527c91_06047340')) {function content_5537bcd7527c91_06047340($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<div class="panel-login">
  <div class="panel panel-primary ">
    <div class="panel-heading">
      <div class="panel-title">Autentificare</div>
    </div>
    <div class="panel-body">
      <form class="form-signin" action="?action=login" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Nume utilizator" name="userName">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Parola" name="password">
        </div>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Logare</button>
      </form>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
<?php }} ?>