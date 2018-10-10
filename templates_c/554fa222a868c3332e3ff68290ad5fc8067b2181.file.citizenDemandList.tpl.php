<?php /* Smarty version Smarty-3.1.13, created on 2015-06-23 23:10:13
         compiled from "E:\Proiect\Licenta\templates\citizenDemandList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:234405589bd25f257d7-27155216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '554fa222a868c3332e3ff68290ad5fc8067b2181' => 
    array (
      0 => 'E:\\Proiect\\Licenta\\templates\\citizenDemandList.tpl',
      1 => 1434813347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '234405589bd25f257d7-27155216',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'notification' => 0,
    'theTableData' => 0,
    'theDoc' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5589bd26257b28_77085393',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5589bd26257b28_77085393')) {function content_5589bd26257b28_77085393($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['notification']->value;?>

<div class="panel panel-primary" style="margin-top: 20px;">
  <div class="panel-heading">
    Lista cu toate cererile facute
  </div>
  <div class="panel-body table-responsive">
    <table id="demandList" class="table table-condensed table-bordered table-corespondenta table-striped">
      <thead>
      <tr>
        <th style="min-width: 175px;"><label style="font-size: 14px;">Nume document</label></th>
        <th style="width: 115px;"><label style="font-size: 14px;">Data depunere</label></th>
        <th style="min-width: 165px;"><label style="font-size: 14px;">Stare</label></th>
        <th style="width: 200px;"><label style="font-size: 14px;">Motiv</label></th>
      </tr>
      </thead>
      <tbody>
        <?php  $_smarty_tpl->tpl_vars['theDoc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theDoc']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['theTableData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theDoc']->key => $_smarty_tpl->tpl_vars['theDoc']->value){
$_smarty_tpl->tpl_vars['theDoc']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['theDoc']->key;
?>
          <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['theDoc']->value->getFormName();?>
</td>
            <td><?php echo date_format($_smarty_tpl->tpl_vars['theDoc']->value->getRegisterDate(),'d/m/Y');?>
</td>
            <td style="width: 165px;">
              <?php if ($_smarty_tpl->tpl_vars['theDoc']->value->getStatus()=='Pending'){?>
                 <span>In curs de procesare</span>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['theDoc']->value->getStatus()=='Accepted'){?>
                 <span style="color: green">Acceptat</span>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['theDoc']->value->getStatus()=='Rejected'){?>
                 <span style="color: red">Respins</span>
              <?php }?>
            </td>
            <td>
              <?php echo $_smarty_tpl->tpl_vars['theDoc']->value->getMotiv();?>

            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
<?php }} ?>