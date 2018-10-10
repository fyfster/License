<?php /* Smarty version Smarty-3.1.13, created on 2015-01-06 21:45:59
         compiled from "D:\PROIECTE_PHP\test_smarty\templates\configurari\LocPrescriereCM.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1330254ac3b77425411-09208231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e95f0d6fa299a32b394b305919c0d627e423b0d' => 
    array (
      0 => 'D:\\PROIECTE_PHP\\test_smarty\\templates\\configurari\\LocPrescriereCM.tpl',
      1 => 1420529008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1330254ac3b77425411-09208231',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'meniuSideBar' => 0,
    'notification' => 0,
    'errorList' => 0,
    'userName' => 0,
    'userEmail' => 0,
    'cui_cif' => 0,
    'userPass' => 0,
    'userPass2' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54ac3b7747b339_43473480',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ac3b7747b339_43473480')) {function content_54ac3b7747b339_43473480($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>


<div class="border">
    <div id="bg"> 
      background
    </div>
    <div class="page">
      <?php echo $_smarty_tpl->tpl_vars['meniuSideBar']->value;?>

      <div class="body">
        <div class="contact">
          <div>
            <?php if ($_smarty_tpl->tpl_vars['notification']->value!=''){?>
                <?php echo $_smarty_tpl->tpl_vars['notification']->value;?>

            <?php }?>
            <h2>Inregistrare Utilizator Nou:</h2>
            <form action="new_user.php?action=createUser" method="POST">
              <label for="user">Utilizator<?php if (isset($_smarty_tpl->tpl_vars['errorList']->value["UserName"])){?> <span style="color: red;">*</span> <?php }?></label>
              <input type="text" name="userName" value="<?php if (isset($_smarty_tpl->tpl_vars['userName']->value)){?><?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
<?php }?>"/>
              <label for="email">E-mail<?php if (isset($_smarty_tpl->tpl_vars['errorList']->value["UserEmail"])){?> <span style="color: red;">*</span> <?php }?></label>
              <input type="text" name="userEmail" value="<?php if (isset($_smarty_tpl->tpl_vars['userEmail']->value)){?><?php echo $_smarty_tpl->tpl_vars['userEmail']->value;?>
<?php }?>" />
              <label for="cui_cif">CUI / CIF <?php if (isset($_smarty_tpl->tpl_vars['errorList']->value["Cui_Cif"])){?> <span style="color: red;">*</span> <?php }?></label>
              <input type="text" name="cui_cif" value="<?php if (isset($_smarty_tpl->tpl_vars['cui_cif']->value)){?><?php echo $_smarty_tpl->tpl_vars['cui_cif']->value;?>
<?php }?>" />
              <label for="pass">Parola<?php if (isset($_smarty_tpl->tpl_vars['errorList']->value["UserPass"])){?> <span style="color: red;">*</span> <?php }?></label>
              <input type="password" name="userPass" value="<?php if (isset($_smarty_tpl->tpl_vars['userPass']->value)){?><?php echo $_smarty_tpl->tpl_vars['userPass']->value;?>
<?php }?>" />
              <label for="pass">Confirmare parola<?php if (isset($_smarty_tpl->tpl_vars['errorList']->value["UserPass2"])){?> <span style="color: red;">*</span> <?php }?></label>
              <input type="password" name="userPass2" value="<?php if (isset($_smarty_tpl->tpl_vars['userPass2']->value)){?><?php echo $_smarty_tpl->tpl_vars['userPass2']->value;?>
<?php }?>" />
              <br />
              <input type="submit" value="Inregistreaza!" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

  
<?php }} ?>