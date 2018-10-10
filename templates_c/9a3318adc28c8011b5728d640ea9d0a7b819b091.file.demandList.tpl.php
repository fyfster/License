<?php /* Smarty version Smarty-3.1.13, created on 2015-04-22 18:23:56
         compiled from "D:\Facultate\Proiect\Licenta\templates\demandList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73375537bd0c33f9a5-05689001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a3318adc28c8011b5728d640ea9d0a7b819b091' => 
    array (
      0 => 'D:\\Facultate\\Proiect\\Licenta\\templates\\demandList.tpl',
      1 => 1429696513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73375537bd0c33f9a5-05689001',
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
  'unifunc' => 'content_5537bd0c3476a3_47252534',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5537bd0c3476a3_47252534')) {function content_5537bd0c3476a3_47252534($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<table style="margin-top:20px;" class="table table-striped  table-bordered">
  <thead>
    <tr>
      <th>Tip formular</th>
      <th>Nume utilizator</th>
      <th>Data postare</th>
      <th>Actiuni</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Cerere</td>
      <td>Citizen</td>
      <td>22-04-2015</td>
      <td style="width: 100px;"><a class="text-center" href="javascript:;" role="button" download><span class="glyphicon glyphicon-eye-open"> Vizualizare</span></a></td>
    </tr>
    <tr>
      <td>Plangere</td>
      <td>Citizen</td>
      <td>22-04-2015</td>
            <td style="width: 100px;"><a class="text-center" href="javascript:;" role="button" download><span class="glyphicon glyphicon-eye-open"> Vizualizare</span></a></td>
    </tr>
    <tr>
      <td>Cerere</td>
      <td>Citizen</td>
      <td>22-04-2015</td>
            <td style="width: 100px;"><a class="text-center" href="javascript:;" role="button" download><span class="glyphicon glyphicon-eye-open"> Vizualizare</span></a></td>
    </tr>
  </tbody>
</table>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
<?php }} ?>