<?php /* Smarty version Smarty-3.1.13, created on 2015-06-21 20:19:03
         compiled from "E:\Proiect\Licenta\templates\user\new_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:295025586f207e428f0-27001621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19072870dd545e52cf2f9f393874d257902b3809' => 
    array (
      0 => 'E:\\Proiect\\Licenta\\templates\\user\\new_user.tpl',
      1 => 1431954794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '295025586f207e428f0-27001621',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'notification' => 0,
    'user' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5586f208005840_30818458',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5586f208005840_30818458')) {function content_5586f208005840_30818458($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['notification']->value;?>

  <form action="new_user.php?action=createUser" method="POST">
    <div class="row" style="margin-top: 20px;">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Informatii necesare pentru logarea utilizatorului (informatii obligatorii)
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Nume utilizator</label>
              <input type="text" class="form-control" name="username"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Adresa email</label>
              <input type="email" class="form-control" name="email"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Parola</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
              <label>Confirmare parola</label>
              <input type="password" class="form-control" name="password2">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-info">
        <div class="panel-heading">
          Informatii necesare pentru eventualele cereri/plangeri
        </div>
        <div class="panel-body">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nume intreg</label>
              <input type="text" class="form-control" name="name"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Telefon</label>
              <input type="text" class="form-control" name="phone"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['phone'];?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Strada</label>
              <input type="text" class="form-control" name="streetName"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['streetName'];?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Apartament</label>
              <input type="text" class="form-control" name="apartment"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['apartment'];?>
" <?php }?>>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Cnp</label>
              <input type="text" class="form-control" name="cnp"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['cnp'];?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Judet</label>
              <input type="text" class="form-control" name="region"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['region'];?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Oras</label>
              <input type="text" class="form-control" name="city"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['city'];?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Numar strada</label>
              <input type="text" class="form-control" name="streetNumber"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value['streetNumber'];?>
" <?php }?>>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-left: -15px;">Inregistrare</button>
  </form>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

  
<?php }} ?>