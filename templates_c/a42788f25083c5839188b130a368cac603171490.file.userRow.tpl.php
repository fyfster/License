<?php /* Smarty version Smarty-3.1.13, created on 2013-02-01 13:00:49
         compiled from "D:\facultate\PHP\smarty\templates\userRow.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23332510ba06155fff9-00270836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a42788f25083c5839188b130a368cac603171490' => 
    array (
      0 => 'D:\\facultate\\PHP\\smarty\\templates\\userRow.tpl',
      1 => 1359715662,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23332510ba06155fff9-00270836',
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
  'unifunc' => 'content_510ba0615762d8_24562145',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510ba0615762d8_24562145')) {function content_510ba0615762d8_24562145($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\facultate\\PHP\\smarty\\app/../plugins\\modifier.truncate.php';
?><tr>
    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>
</td>
    <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['user']->value->getDescription(),45);?>
...</td>
    <td>
        <?php if ($_smarty_tpl->tpl_vars['authenticated']->value==true){?>
            <a href="?action=user&id=<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
">Vezi mai mult</a>
        <?php }else{ ?>
            Vezi mai mult
        <?php }?>
    </td>
</tr><?php }} ?>