<?php /* Smarty version Smarty-3.1.13, created on 2015-06-23 23:10:11
         compiled from "E:\Proiect\Licenta\templates\form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207725589bd23829843-14648052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fd5057a7f1014fe487454c9bf367a4975898a7b' => 
    array (
      0 => 'E:\\Proiect\\Licenta\\templates\\form.tpl',
      1 => 1432328942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207725589bd23829843-14648052',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'notification' => 0,
    'formTypeName' => 0,
    'xmlPath' => 0,
    'formTypeValue' => 0,
    'formTypeId' => 0,
    'formPath' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5589bd2384e3c1_87602866',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5589bd2384e3c1_87602866')) {function content_5589bd2384e3c1_87602866($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['notification']->value;?>

<div class="jumbotron" style="padding-top: 0px;">
  <h2><?php echo $_smarty_tpl->tpl_vars['formTypeName']->value;?>
</h2>
  <p class="lead">
    Va rog sa descarcati fisierul apasand pe butonul "Descarca document". Dupa ce ati descarcat fisierul 
    completati campurile necesare si salvati documentul. Cand ati finalizat documentul va rog sa il predati 
    apasand pe butonul "Incarca cerere" si selectati cererea completata
  </p><br/>
  <p class="lead">
    Puteti completa informatiile dumneavoastra in cerere descarcand fisiereul <a href="<?php echo $_smarty_tpl->tpl_vars['xmlPath']->value;?>
" role="button" download>acesta</a> si 
    importand fisierul descarcat in pdf folosind butonul "Import" din pdf
  </p>
  <form class="form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['formTypeValue']->value;?>
Form.php?action=upload&formTypeId=<?php echo $_smarty_tpl->tpl_vars['formTypeId']->value;?>
" name="submit" enctype="multipart/form-data">
    <p class="text-center">
      <a class="btn btn-lg btn-success" href="<?php echo $_smarty_tpl->tpl_vars['formPath']->value;?>
" role="button" download>Descarca document</a>
      <a class="btn btn-lg btn-success uploadFake" href="javascript:;" role="button">Incarca document</a>
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