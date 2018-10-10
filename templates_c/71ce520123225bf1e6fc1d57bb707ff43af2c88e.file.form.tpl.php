<?php /* Smarty version Smarty-3.1.13, created on 2015-04-22 18:14:15
         compiled from "D:\Facultate\Proiect\Licenta\templates\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:230635537bac7b39c85-37644960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71ce520123225bf1e6fc1d57bb707ff43af2c88e' => 
    array (
      0 => 'D:\\Facultate\\Proiect\\Licenta\\templates\\form.tpl',
      1 => 1429684496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '230635537bac7b39c85-37644960',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'formPath' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5537bac7b4d504_69665994',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5537bac7b4d504_69665994')) {function content_5537bac7b4d504_69665994($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<div class="jumbotron" style="padding-top: 0px;">
  <h2>Cerere autorizare comert stradal temporar</h2>
  <p class="lead">
    Va rog sa descarcati fisierul apasand pe butonul "Descarca cerere". Dupa ce ati descarcat fisierul 
    completati campurile necesare si salvati documentul. Cand ati finalizat documentul va rog sa il predati 
    apasand pe butonul "Incarca cerere" si selectati cererea completata</p>
  <form class="form" method="post" action="form.php?action=upload" name="submit" enctype="multipart/form-data">
    <p class="text-center">
      <a class="btn btn-lg btn-success" href="<?php echo $_smarty_tpl->tpl_vars['formPath']->value;?>
" role="button" download>Descarca cerere</a>
      <a class="btn btn-lg btn-success uploadFake" href="#" role="button">Incarca cerere</a>
      <input type="file" id="uploadFile" style="visibility:hidden;" name="uploadedfile">  
      <script>
        $(document).on('click', '.uploadFake', function(event) {
          $('#uploadFile').click();
        });
        $(document).on('change', '#uploadFile', function(event) {
          $('.form').submit();
        });
      </script>
    </p>
  </form>
</div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
<?php }} ?>