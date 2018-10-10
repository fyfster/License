<?php /* Smarty version Smarty-3.1.13, created on 2015-06-23 23:06:34
         compiled from "E:\Proiect\Licenta\templates\stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19225589bc4a49c569-16151495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30930b5227d00fed1d6ac49fea7b6fc2502035a8' => 
    array (
      0 => 'E:\\Proiect\\Licenta\\templates\\stats.tpl',
      1 => 1434299533,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19225589bc4a49c569-16151495',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'notification' => 0,
    'nrAccepteDemands' => 0,
    'nrRejectedDemands' => 0,
    'nrPendingDemands' => 0,
    'totalDemands' => 0,
    'nrResolvedComplaints' => 0,
    'nrPendingComplaints' => 0,
    'totalComplaints' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5589bc4a6b8e31_29096887',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5589bc4a6b8e31_29096887')) {function content_5589bc4a6b8e31_29096887($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php echo $_smarty_tpl->tpl_vars['notification']->value;?>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary" style="margin-top: 20px;">
      <div class="panel-heading">
        Cereri
      </div>
      <div class="panel-body">
        <input type="hidden" id="nrAccepteDemands" value="<?php echo $_smarty_tpl->tpl_vars['nrAccepteDemands']->value;?>
" />
        <input type="hidden" id="nrRejectedDemands" value="<?php echo $_smarty_tpl->tpl_vars['nrRejectedDemands']->value;?>
" />
        <input type="hidden" id="nrPendingDemands" value="<?php echo $_smarty_tpl->tpl_vars['nrPendingDemands']->value;?>
" />
        <div class"form-group">
          <h3>Total cereri: <?php echo $_smarty_tpl->tpl_vars['totalDemands']->value;?>
</h3>
          <h4 style="color: #1F7A1F;">Cereri acceptate: <?php echo $_smarty_tpl->tpl_vars['nrAccepteDemands']->value;?>
</h4>
          <h4 style="color: #F7464A;">Cereri respinse: <?php echo $_smarty_tpl->tpl_vars['nrRejectedDemands']->value;?>
</h4>
          <h4 style="color: #008AE6;">Cereri in curs de procesare: <?php echo $_smarty_tpl->tpl_vars['nrPendingDemands']->value;?>
</h4>
        </div>                           
        <canvas id="myDemandChart"></canvas>
        <script>
        var ctx = document.getElementById("myDemandChart").getContext("2d");
        var data = [
          {
            value:  $("#nrRejectedDemands").val(),
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "Respinse"
          },
          {
            value: $("#nrAccepteDemands").val(),
            color: "#1F7A1F",
            highlight: "#2EB82E",
            label: "Acceptate"
          },
          {
            value: $("#nrPendingDemands").val(),
            color: "#008AE6",
            highlight: "#0099FF",
            label: "In curs de procesare"
          }
        ];
        var myPieChart = new Chart(ctx).Pie(data,{
            responsive : true
        });
        </script>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="panel panel-primary" style="margin-top: 20px;">
      <div class="panel-heading">
        Plangeri
      </div>
      <div class="panel-body">
        <input type="hidden" id="nrResolvedComplaints" value="<?php echo $_smarty_tpl->tpl_vars['nrResolvedComplaints']->value;?>
" />
        <input type="hidden" id="nrPendingComplaints" value="<?php echo $_smarty_tpl->tpl_vars['nrPendingComplaints']->value;?>
" />
        <div class"form-group">
          <h3>Total plangeri: <?php echo $_smarty_tpl->tpl_vars['totalComplaints']->value;?>
</h3>
          <h4 style="color: #1F7A1F;">Plangeri rezolvate: <?php echo $_smarty_tpl->tpl_vars['nrResolvedComplaints']->value;?>
</h4>
          <h4 style="color: #008AE6;">Plangeri in curs de procesare: <?php echo $_smarty_tpl->tpl_vars['nrPendingComplaints']->value;?>
</h4>
        </div>                           
        <canvas id="myComplaintChart"></canvas>
        <script>
        var ctx2 = document.getElementById("myComplaintChart").getContext("2d");
        var data2 = [
          {
            value: $("#nrPendingComplaints").val(),
            color: "#008AE6",
            highlight: "#0099FF",
            label: "In curs de procesare"
          },
          {
            value: $("#nrResolvedComplaints").val(),
            color: "#1F7A1F",
            highlight: "#2EB82E",
            label: "Rezolvate"
          }
        ];
        var myPieChart = new Chart(ctx2).Pie(data2,{
            responsive : true
        });
        </script>
      </div>
    </div>
  </div>
</div>

<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
<?php }} ?>