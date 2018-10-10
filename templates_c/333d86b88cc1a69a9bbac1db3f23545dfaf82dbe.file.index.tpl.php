<?php /* Smarty version Smarty-3.1.13, created on 2015-04-22 18:24:40
         compiled from "D:\Facultate\Proiect\Licenta\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:294985537bd381c2c99-00021835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '333d86b88cc1a69a9bbac1db3f23545dfaf82dbe' => 
    array (
      0 => 'D:\\Facultate\\Proiect\\Licenta\\templates\\index.tpl',
      1 => 1427743345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '294985537bd381c2c99-00021835',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'notification' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5537bd381d6514_17183293',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5537bd381d6514_17183293')) {function content_5537bd381d6514_17183293($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<h1 class="page-header">Bine ati venit</h1>
<?php if ($_smarty_tpl->tpl_vars['notification']->value!=''){?>
  <?php echo $_smarty_tpl->tpl_vars['notification']->value;?>

<?php }?>
<div class="row">
  <div class="col-lg-8 col-sm-12">
    
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
<?php }} ?>