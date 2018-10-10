<?php /* Smarty version Smarty-3.1.13, created on 2013-02-01 12:45:30
         compiled from "D:\facultate\PHP\smarty\templates\edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21971510b9cca9263b7-14474058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d6ba67f12d6daf47d01c3ef87ff4fd9afa0b377' => 
    array (
      0 => 'D:\\facultate\\PHP\\smarty\\templates\\edit.tpl',
      1 => 1359714662,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21971510b9cca9263b7-14474058',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_title' => 0,
    'header' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_510b9cca93c375_61961240',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510b9cca93c375_61961240')) {function content_510b9cca93c375_61961240($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['app_title']->value;?>
</title>
</head>
<body>
<?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<form action="" method="post">
    <table>
        <tr>
            <td style="vertical-align: top">name:</td>
            <td><input style="width: 300px;" type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>
"/></td>
        </tr>
        <tr>
            <td style="vertical-align: top">description:</td>
            <td><textarea style="width: 300px; height: 200px;" name="descriere"
                          id="descriere"><?php echo $_smarty_tpl->tpl_vars['user']->value->getDescription();?>
</textarea></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
"</td>
            <td><input type="submit" value="Salveaza"/></td>
        </tr>
    </table>
</form>
<a href="/">Inapoi</a>
</body>
</html><?php }} ?>