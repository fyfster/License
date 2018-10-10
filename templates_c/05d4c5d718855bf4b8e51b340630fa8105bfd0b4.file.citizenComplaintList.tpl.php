<?php /* Smarty version Smarty-3.1.13, created on 2015-06-06 15:22:20
         compiled from "D:\Proiect\Licenta\templates\citizenComplaintList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:252005572e5fc8735f4-22112163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05d4c5d718855bf4b8e51b340630fa8105bfd0b4' => 
    array (
      0 => 'D:\\Proiect\\Licenta\\templates\\citizenComplaintList.tpl',
      1 => 1433449452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '252005572e5fc8735f4-22112163',
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
  'unifunc' => 'content_5572e5fc8c0685_01686496',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5572e5fc8c0685_01686496')) {function content_5572e5fc8c0685_01686496($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['notification']->value;?>

<div class="panel panel-primary" style="margin-top: 20px;">
  <div class="panel-heading">
    Lista cu toate plangerile facute
  </div>
  <div class="panel-body">
    <table id="complaintList" class="table table-condensed table-bordered table-corespondenta table-striped table-responsive">
      <thead>
      <tr>
        <th><label style="font-size: 14px;">Nume document</label></th>
        <th style="width: 115px;"><label style="font-size: 14px;">Data depunere</label></th>
        <th style="width: 115px;"><label style="font-size: 14px;">Stare</label></th>
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
              <?php if ($_smarty_tpl->tpl_vars['theDoc']->value->getStatus()=='Resolved'){?>
                 <span style="color: green">Resolvata</span>
              <?php }?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
<?php }} ?>