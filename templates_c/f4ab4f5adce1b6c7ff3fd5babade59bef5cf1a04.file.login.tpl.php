<?php /* Smarty version Smarty-3.1.13, created on 2015-06-23 23:10:44
         compiled from "E:\Proiect\Licenta\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10105589bd4492fc44-10052068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4ab4f5adce1b6c7ff3fd5babade59bef5cf1a04' => 
    array (
      0 => 'E:\\Proiect\\Licenta\\templates\\login.tpl',
      1 => 1433440891,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10105589bd4492fc44-10052068',
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
  'unifunc' => 'content_5589bd4493e362_12581261',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5589bd4493e362_12581261')) {function content_5589bd4493e362_12581261($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

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