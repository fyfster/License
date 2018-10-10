<?php /* Smarty version Smarty-3.1.13, created on 2014-12-01 14:22:39
         compiled from "D:\PROIECTE_PHP\test_smarty\templates\auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24272547c5d8f7b6e82-49984556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '096fbe1a5b8dddf17702fb47441af4ae7871613e' => 
    array (
      0 => 'D:\\PROIECTE_PHP\\test_smarty\\templates\\auth.tpl',
      1 => 1416508796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24272547c5d8f7b6e82-49984556',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'authenticated' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_547c5d8f7f5694_21320245',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547c5d8f7f5694_21320245')) {function content_547c5d8f7f5694_21320245($_smarty_tpl) {?><div>
    <?php if ($_smarty_tpl->tpl_vars['authenticated']->value==true){?>
        <a href="?action=logout">Logout</a>
    <?php }else{ ?>
        <a href="?action=login">Login</a>
    <?php }?>
</div>
<hr/><?php }} ?>