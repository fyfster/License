<?php /* Smarty version Smarty-3.1.13, created on 2014-12-01 14:44:19
         compiled from "D:\PROIECTE_PHP\test_smarty\templates\userRow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14315547c62a3cae9f1-97394764%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d0f690743922fbb8cc944ff49f57a9add20eab4' => 
    array (
      0 => 'D:\\PROIECTE_PHP\\test_smarty\\templates\\userRow.tpl',
      1 => 1416507643,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14315547c62a3cae9f1-97394764',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'authenticated' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_547c62a3ccddf5_23719860',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547c62a3ccddf5_23719860')) {function content_547c62a3ccddf5_23719860($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\PROIECTE_PHP\\test_smarty\\app/../plugins\\modifier.truncate.php';
?><tr>
    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>
</td>
    <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['user']->value->getEmail(),45);?>
...</td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['authenticated']->value==true){?>
            <a href="?action=user&id=<?php echo $_smarty_tpl->tpl_vars['user']->value->getUsers();?>
">Vezi mai mult</a>
        <?php }else{ ?>
            Vezi mai mult
        <?php }?>
    </td>
</tr><?php }} ?>