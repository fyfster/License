<?php /* Smarty version Smarty-3.1.13, created on 2013-02-01 13:00:49
         compiled from "D:\facultate\PHP\smarty\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15653510ba061533730-64121330%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14cd42abc914ccae0d19deffb2929b31f74b2bbd' => 
    array (
      0 => 'D:\\facultate\\PHP\\smarty\\templates\\index.tpl',
      1 => 1359716414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15653510ba061533730-64121330',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_title' => 0,
    'header' => 0,
    'users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_510ba0615444e1_87591125',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510ba0615444e1_87591125')) {function content_510ba0615444e1_87591125($_smarty_tpl) {?><?php if (!is_callable('smarty_function_userRow')) include 'D:\\facultate\\PHP\\smarty\\app/../plugins\\function.userRow.php';
?><!DOCTYPE html>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['app_title']->value;?>
</title>
</head>
<body>
<?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<table>
    <tr>
        <th>Nume</th>
        <th>Descriere</th>
        <th>&nbsp;</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
        <?php echo smarty_function_userRow(array('user'=>$_smarty_tpl->tpl_vars['user']->value),$_smarty_tpl);?>

    <?php } ?>
</table>
</body>
</html><?php }} ?>