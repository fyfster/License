<?php /* Smarty version Smarty-3.1.13, created on 2015-06-23 23:10:47
         compiled from "E:\Proiect\Licenta\templates\notification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125245589bd4799daf0-34016588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c09dc456cbdd5d7f8872de6723642ba7c1cf58a9' => 
    array (
      0 => 'E:\\Proiect\\Licenta\\templates\\notification.tpl',
      1 => 1431951848,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125245589bd4799daf0-34016588',
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
  'unifunc' => 'content_5589bd479e73c7_54804710',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5589bd479e73c7_54804710')) {function content_5589bd479e73c7_54804710($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['notificationMsg']->value){?>
<?php if ($_smarty_tpl->tpl_vars['notificationMsg']->value!=''){?>
  <div class="alert <?php if ($_smarty_tpl->tpl_vars['notificationType']->value=='error'){?>alert-danger<?php }elseif($_smarty_tpl->tpl_vars['notificationType']->value=='success'){?>alert-success<?php }?>" style="margin-top: 15px;">
    <div class="right close" data-dismiss="alert"><span class="glyphicon glyphicon-remove"></span></div>
    <?php echo $_smarty_tpl->tpl_vars['notificationMsg']->value;?>

  </div>
<?php }?>
<?php }?>
<?php }} ?>