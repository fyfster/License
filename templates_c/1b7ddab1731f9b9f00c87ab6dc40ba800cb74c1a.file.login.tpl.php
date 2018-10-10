<?php /* Smarty version Smarty-3.1.13, created on 2013-02-01 13:00:45
         compiled from "D:\facultate\PHP\smarty\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2595510ba05d3d0502-72277126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b7ddab1731f9b9f00c87ab6dc40ba800cb74c1a' => 
    array (
      0 => 'D:\\facultate\\PHP\\smarty\\templates\\login.tpl',
      1 => 1359715011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2595510ba05d3d0502-72277126',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_title' => 0,
    'header' => 0,
    'notification' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_510ba05d3da496_68266386',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510ba05d3da496_68266386')) {function content_510ba05d3da496_68266386($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['app_title']->value;?>
</title>
</head>
<body>
<?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['notification']->value;?>

<form action="?action=login" method="post">
    <table>
        <tr>
            <td>username:</td>
            <td><input type="text" name="username" id="username"/></td>
        </tr>
        <tr>
            <td>password:</td>
            <td><input type="password" name="password" id="password"/></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Login"/></td>
        </tr>
    </table>
</form>
<a href="/">Inapoi</a>
</body>
</html><?php }} ?>