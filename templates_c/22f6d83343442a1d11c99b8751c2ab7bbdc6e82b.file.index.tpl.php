<?php /* Smarty version Smarty-3.1.13, created on 2014-12-01 14:14:16
         compiled from "D:\PROIECTE_PHP\test_smarty\templates\users\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20949547c5b98dc9ff2-45918557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22f6d83343442a1d11c99b8751c2ab7bbdc6e82b' => 
    array (
      0 => 'D:\\PROIECTE_PHP\\test_smarty\\templates\\users\\index.tpl',
      1 => 1416507853,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20949547c5b98dc9ff2-45918557',
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
  'unifunc' => 'content_547c5b98dc9ff1_01871502',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547c5b98dc9ff1_01871502')) {function content_547c5b98dc9ff1_01871502($_smarty_tpl) {?><?php if (!is_callable('smarty_function_userRow')) include 'D:\\PROIECTE_PHP\\test_smarty\\app/../plugins\\function.userRow.php';
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
        <th width="150px" align="left">Nume</th>
        <th  width="200px" align="left">Email</th>
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