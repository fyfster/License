<?php /* Smarty version Smarty-3.1.13, created on 2015-06-16 20:56:09
         compiled from "D:\Proiect\Licenta\templates\userList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17946558063394cf3f0-96794734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5ca955b44e6924bfe4f59e97371b34af2bc9e64' => 
    array (
      0 => 'D:\\Proiect\\Licenta\\templates\\userList.tpl',
      1 => 1434476747,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17946558063394cf3f0-96794734',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'notification' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_558063395cf359_87945087',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558063395cf359_87945087')) {function content_558063395cf359_87945087($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['notification']->value;?>

<div class="panel panel-primary" style="margin-top: 20px;">
  <div class="panel-heading">
    Lista utilizatori
  </div>
  <div class="panel-body">
    <table id="userList" class="table table-condensed table-bordered table-corespondenta table-striped table-responsive">
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
              <input type="text" class="form-control filter-field" id="name" placeholder="Nume persoana..."/>
            </div>
          </td>
      </tr>
      <tr>
        <th>Nume persoana</th>
        <th style="width: 100px;">Cetatean</th>
        <th style="width: 100px;">Angajat</th>
      </tr>
      </thead>
    </table>
  </div>
</div>

<script>
  $(document).on( "click", ".isCitizen", function(){
    $.ajax({
      type: "POST",
      url: "userList.php?action=isCitizen&id="+$(this).data('id')
    });
    $(this).parent().parent().parent().find('.isEmployee').prop('checked', false);
    theTable._fnReDraw();
  });
  
  $(document).on( "click", ".isEmployee", function(){
    $.ajax({
      type: "POST",
      url: "userList.php?action=isEmployee&id="+$(this).data('id')
    });
    $(this).parent().parent().parent().find('.isCitizen').prop('checked', false);
    theTable._fnReDraw();
  });
  
  $(".datepicker").datepicker();
  var theColumns = [
      { "sName": "Nume persoana"},
      { "sName": "Cetatean", "sClass" : "align-center", "bSortable": false},
      { "sName": "Angajat", "sClass" : "align-center", "bSortable": false}
  ];
                  
  var theTable = $("#userList").dataTable({
    "bServerSide": true,
    "sAjaxSource": 'userList.php?action=getData',
    "bPaginate": true,
    "fnServerData": function (sSource, aoData, fnCallback) {
      aoData.push({
        "name": "filter[name]", 
        "value": $('#name').val()
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
</script>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
<?php }} ?>