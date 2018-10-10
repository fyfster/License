<?php /* Smarty version Smarty-3.1.13, created on 2015-06-23 23:09:38
         compiled from "E:\Proiect\Licenta\templates\user\edit_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33075589bd022a9fc7-23159940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cfd47a701edd2e692174da29f4fa0439a136123' => 
    array (
      0 => 'E:\\Proiect\\Licenta\\templates\\user\\edit_user.tpl',
      1 => 1434810981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33075589bd022a9fc7-23159940',
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
  'unifunc' => 'content_5589bd0249e123_06666278',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5589bd0249e123_06666278')) {function content_5589bd0249e123_06666278($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['notification']->value;?>

  <form action="edit_user.php?action=editUser&id=<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
" method="POST">
    <div class="row" style="margin-top: 20px;">
      <div class="panel panel-danger">
        <div class="panel-heading">
          Pentru a face orice modificare la cont este necasar sa introduceti parola in campul "Parola curenta".
        </div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          Informatii necesare pentru logarea utilizatorului (informatii obligatorii)
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Nume utilizator</label>
              <input type="text" class="form-control" disabled name="username" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getUsername();?>
" >
            </div>
            <div class="form-group">
              <label>Adresa email</label>
              <input type="email" class="form-control" disabled name="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
" >
            </div>
            <div class="form-group">
              <label>Parola curenta</label>
              <input type="password" class="form-control" name="oldPassword">
            </div>
            <div class="form-group">
              <label>Parola noua</label>
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
              <input type="text" class="form-control" name="name"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Telefon</label>
              <input type="text" class="form-control" name="phone"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getPhone();?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Strada</label>
              <input type="text" class="form-control" name="streetName"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getStreetName();?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Apartament</label>
              <input type="text" class="form-control" name="apartment"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getApartment();?>
" <?php }?>>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Cnp</label>
              <input type="text" class="form-control" name="cnp"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getCnp();?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Judet</label>
              <input type="text" class="form-control" name="region"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getRegion();?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Oras</label>
              <input type="text" class="form-control" name="city"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getCity();?>
" <?php }?>>
            </div>
            <div class="form-group">
              <label>Numar strada</label>
              <input type="text" class="form-control" name="streetNumber"<?php if ($_smarty_tpl->tpl_vars['user']->value){?> value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getStreetNumber();?>
" <?php }?>>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-left: -15px;">Modificare</button>
    <a href="index.php" class="btn btn-primary" style="margin-left: 15px;">Cancel</a>
  </form>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

  
<?php }} ?>