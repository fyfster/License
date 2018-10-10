<?php /* Smarty version Smarty-3.1.13, created on 2013-02-01 13:00:46
         compiled from "D:\facultate\PHP\smarty\templates\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24888510ba05ecf9f20-17659846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84c38055a3f3266d7dace9fd4b3504dcd19fdb11' => 
    array (
      0 => 'D:\\facultate\\PHP\\smarty\\templates\\user.tpl',
      1 => 1359714295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24888510ba05ecf9f20-17659846',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_title' => 0,
    'header' => 0,
    'user' => 0,
    'level' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_510ba05ed13313_72410573',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510ba05ed13313_72410573')) {function content_510ba05ed13313_72410573($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['app_title']->value;?>
</title>
</head>
<body>
<?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<h1><?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>
</h1>

<p>
    <?php echo $_smarty_tpl->tpl_vars['user']->value->getDescription();?>

</p>
<?php if ($_smarty_tpl->tpl_vars['level']->value=="admin"){?>
    <a href="?action=user&edit=true&id=<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
">Editare</a>
<?php }?>
<a href="/">Inapoi</a>
</body>
</html><?php }} ?>