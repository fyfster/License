<?php /* Smarty version Smarty-3.1.13, created on 2013-02-01 13:00:49
         compiled from "D:\facultate\PHP\smarty\templates\auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28638510ba061509500-56302553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '495321b064164a6932adbae058459f0e37f902d5' => 
    array (
      0 => 'D:\\facultate\\PHP\\smarty\\templates\\auth.tpl',
      1 => 1359713351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28638510ba061509500-56302553',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'authenticated' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_510ba06151a8a6_66412984',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510ba06151a8a6_66412984')) {function content_510ba06151a8a6_66412984($_smarty_tpl) {?><div>
    <?php if ($_smarty_tpl->tpl_vars['authenticated']->value==true){?>
        <a href="?action=logout">Logout</a>
    <?php }else{ ?>
        <a href="?action=login">Login</a>
    <?php }?>
</div>
<hr/><?php }} ?>