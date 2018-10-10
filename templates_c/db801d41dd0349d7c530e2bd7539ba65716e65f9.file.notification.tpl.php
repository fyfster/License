<?php /* Smarty version Smarty-3.1.13, created on 2015-06-18 21:14:19
         compiled from "D:\Proiect\Licenta\templates\notification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:235455830a7b175722-52228128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db801d41dd0349d7c530e2bd7539ba65716e65f9' => 
    array (
      0 => 'D:\\Proiect\\Licenta\\templates\\notification.tpl',
      1 => 1431951848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235455830a7b175722-52228128',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'notificationMsg' => 0,
    'notificationType' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55830a7b1adec8_95600346',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55830a7b1adec8_95600346')) {function content_55830a7b1adec8_95600346($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['notificationMsg']->value){?>
<?php if ($_smarty_tpl->tpl_vars['notificationMsg']->value!=''){?>
  <div class="alert <?php if ($_smarty_tpl->tpl_vars['notificationType']->value=='error'){?>alert-danger<?php }elseif($_smarty_tpl->tpl_vars['notificationType']->value=='success'){?>alert-success<?php }?>" style="margin-top: 15px;">
    <div class="right close" data-dismiss="alert"><span class="glyphicon glyphicon-remove"></span></div>
    <?php echo $_smarty_tpl->tpl_vars['notificationMsg']->value;?>

  </div>
<?php }?>
<?php }?>
<?php }} ?>