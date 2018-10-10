<?php /* Smarty version Smarty-3.1.13, created on 2015-06-18 21:14:09
         compiled from "D:\Proiect\Licenta\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:304855830a717601c6-85685883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '286956e8b2fe9a72de13b59bc4729c94a22f66f0' => 
    array (
      0 => 'D:\\Proiect\\Licenta\\templates\\login.tpl',
      1 => 1433440891,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '304855830a717601c6-85685883',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55830a717c0052_84423855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55830a717c0052_84423855')) {function content_55830a717c0052_84423855($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<div class="panel-login">
  <div class="panel panel-primary ">
    <div class="panel-heading">
      <header>
        <div class="panel-title">Autentificare</div>
      </header>
    </div>
    <div class="panel-body">
      <form class="form-signin" action="?action=login" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Nume utilizator" name="userName">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Parola" name="password">
        </div>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Logare</button>
      </form>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
<?php }} ?>