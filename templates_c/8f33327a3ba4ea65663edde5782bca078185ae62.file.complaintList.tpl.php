<?php /* Smarty version Smarty-3.1.13, created on 2015-06-16 20:55:39
         compiled from "D:\Proiect\Licenta\templates\complaintList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63685580631bccc935-39837354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f33327a3ba4ea65663edde5782bca078185ae62' => 
    array (
      0 => 'D:\\Proiect\\Licenta\\templates\\complaintList.tpl',
      1 => 1434392402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63685580631bccc935-39837354',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'notification' => 0,
    'formTypeList' => 0,
    'theFormType' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5580631bd19950_32820318',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5580631bd19950_32820318')) {function content_5580631bd19950_32820318($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['notification']->value;?>

<div class="panel panel-primary" style="margin-top: 20px;">
  <div class="panel-heading">
    Lista cu toate plangerile facute
  </div>
  <div class="panel-body">
    <table id="complaintList" class="table table-condensed table-bordered table-corespondenta table-striped table-responsive">
      <thead>
        <tr>
          <th colspan="9" class="collapse-btn">
            <span class="glyphicon glyphicon-minus "></span> Filtre
          </th>
        </tr>
        <tr>
          <td colspan="9" class="filters-columns">
            <input type="hidden" name="hideFilters" value="0" />
            <div style="margin-left: -10px;" class="col-lg-4 col-sm-4 col-md-4 col-filters">
              <select class="form-control filter-field" id="documentType">
                <option value="">Alege tip plangere...</option>
                <?php  $_smarty_tpl->tpl_vars['theFormType'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theFormType']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formTypeList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theFormType']->key => $_smarty_tpl->tpl_vars['theFormType']->value){
$_smarty_tpl->tpl_vars['theFormType']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['theFormType']->key;
?>
                  <?php if ($_smarty_tpl->tpl_vars['theFormType']->value->getType()=='p'){?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['theFormType']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['theFormType']->value->getName();?>
</option>
                  <?php }?>
                <?php } ?>
              </select>
            </div>
            <div style="margin-left: -10px;" class="col-lg-2 col-sm-4 col-md-4 col-filters">
              <input type="text" class="form-control filter-field" id="name" placeholder="Nume persoana..."/>
            </div>
            <div style="margin-left: -10px;" class="col-lg-2 col-sm-4 col-md-4 col-filters">
              <select class="form-control filter-field" id="status">
                <option value="">Alege status...</option>
                <option value="Pending">In curs de procesare</option>
                <option value="Resolved">Rezolvata</option>
              </select>
            </div>
            <div class="col-lg-2 col-sm-6 col-md-3 col-filters">
              <input type="text" class="form-control datepicker filter-field" name="datestart" id="start" value="" placeholder="Data inceput..." />
            </div>
            <div class="col-lg-2 col-sm-6 col-md-3 col-filters ">
              <input type="text" class="form-control datepicker filter-field" name="dateend" id="end" value=""  placeholder="Data sfarsit..." />
            </div>
          </td>
      </tr>
      <tr>
        <th style="width: 150px;">Nume persoana</th>
        <th>Tip cerere</th>
        <th style="width: 115px;">Data inregistrare</th>
        <th style="width: 135px;">Stare</th>
        <th style="width: 185px;">Actiuni</th>
      </tr>
      </thead>
    </table>
  </div>
</div>

<script>
  $(document).on( "click", ".downloadBtn", function(){
    $.ajax({
      type: "POST",
      url: "complaintList.php?action=viewComplaint&id="+$(this).data('id')
    });
    $(this).removeClass('btn-primary');
    $(this).addClass('btn-success');
  });

  $(".datepicker").datepicker();
  var theColumns = [
      { "sName": "Nume persoana"},
      { "sName": "Tip document"},
      { "sName": "Data inregistrare"},
      { "sName": "Stare", "bSortable": false},
      { "sName": "Actiuni", "sClass" : "align-center", "bSortable": false}
  ];
                  
  var theTable = $("#complaintList").dataTable({
    "bServerSide": true,
    "sAjaxSource": 'complaintList.php?action=getData',
    "bPaginate": true,
    "fnServerData": function (sSource, aoData, fnCallback) {
      aoData.push({
        "name": "filter[startDate]", 
        "value": $('#start').val()
        });
      aoData.push({
        "name": "filter[endDate]", 
        "value": $('#end').val()
      });
      aoData.push({
        "name": "filter[name]", 
        "value": $('#name').val()
      });
      aoData.push({
        "name": "filter[documentType]", 
        "value": $('#documentType').val()
      });
      aoData.push({
        "name": "filter[status]", 
        "value": $('#status').val()
      });
      $.ajax({
        "dataType": 'json',
        "type": "POST",
        "url": sSource,
        "data": aoData,
        "success": fnCallback
      });
    },
    "sPaginationType": "full_numbers", //full_numbers
    "aoColumns": theColumns
  });
  
  $('#name').on( 'keyup', function () {
      theTable._fnReDraw();
  });
  $('#start').on( 'change', function () {
      theTable._fnReDraw();
  });
  $('#end').on( 'change', function () {
      theTable._fnReDraw();
  });
  $('#documentType').on( 'change', function () {
      theTable._fnReDraw();
  });
  $('#status').on( 'change', function () {
      theTable._fnReDraw();
  });
</script>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
<?php }} ?>