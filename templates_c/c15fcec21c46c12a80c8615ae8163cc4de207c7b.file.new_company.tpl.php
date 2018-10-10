<?php /* Smarty version Smarty-3.1.13, created on 2015-01-06 17:36:49
         compiled from "D:\PROIECTE_PHP\test_smarty\templates\new_company.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2049854ac01118f3708-99700521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c15fcec21c46c12a80c8615ae8163cc4de207c7b' => 
    array (
      0 => 'D:\\PROIECTE_PHP\\test_smarty\\templates\\new_company.tpl',
      1 => 1418758941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2049854ac01118f3708-99700521',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'meniuSideBar' => 0,
    'notification' => 0,
    'errorList' => 0,
    'companyName' => 0,
    'companyEmail' => 0,
    'cui_cif' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54ac011195cea1_65930847',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ac011195cea1_65930847')) {function content_54ac011195cea1_65930847($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>


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
            <h2>Inregistrare Companie Noua:</h2>
            <form action="new_company.php?action=createCompany" method="POST">
              <label for="companyName">Denumire Companie<?php if (isset($_smarty_tpl->tpl_vars['errorList']->value["CompanyName"])){?> <span style="color: red;">*</span> <?php }?></label>
              <input type="text" name="companyName" value="<?php if (isset($_smarty_tpl->tpl_vars['companyName']->value)){?><?php echo $_smarty_tpl->tpl_vars['companyName']->value;?>
<?php }?>"/>
              <label for="companyEmail">E-mail<?php if (isset($_smarty_tpl->tpl_vars['errorList']->value["companyEmail"])){?> <span style="color: red;">*</span> <?php }?></label>
              <input type="text" name="companyEmail" value="<?php if (isset($_smarty_tpl->tpl_vars['companyEmail']->value)){?><?php echo $_smarty_tpl->tpl_vars['companyEmail']->value;?>
<?php }?>" />
              <label for="cui_cif">CUI / CIF <?php if (isset($_smarty_tpl->tpl_vars['errorList']->value["Cui_Cif"])){?> <span style="color: red;">*</span> <?php }?></label>
              <input type="text" name="cui_cif" value="<?php if (isset($_smarty_tpl->tpl_vars['cui_cif']->value)){?><?php echo $_smarty_tpl->tpl_vars['cui_cif']->value;?>
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