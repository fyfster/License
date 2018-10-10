{$header}
{$notification}
<div class="panel panel-primary" style="margin-top: 20px;">
  <div class="panel-heading">
    Lista cu toate cererile facute
  </div>
  <div class="panel-body">
    <table id="demandList" class="table table-condensed table-bordered table-corespondenta table-striped table-responsive">
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
                <option value="">Alege tip cerere...</option>
                {foreach from=$formTypeList key=k item=theFormType}
                  {if $theFormType->getType() eq 'c'}
                    <option value="{$theFormType->getId()}">{$theFormType->getName()}</option>
                  {/if}
                {/foreach}
              </select>
            </div>
            <div style="margin-left: -10px;" class="col-lg-2 col-sm-4 col-md-4 col-filters">
              <input type="text" class="form-control filter-field" id="name" placeholder="Nume persoana..."/>
            </div>
            <div style="margin-left: -10px;" class="col-lg-2 col-sm-4 col-md-4 col-filters">
              <select class="form-control filter-field" id="status">
                <option value="">Alege status...</option>
                <option value="Pending">In curs de procesare</option>
                <option value="Accepted">Acceptat</option>
                <option value="Rejected">Respins</option>
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

<div class="modal fade" id="rejectModal" role="dialog">
  <div class="modal-dialog">
    <form action='' id="rejectModalForm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Motivul respingerii</h4>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control filter-field" id="motivRespingereInput" name="motiv"/>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary submitBtn" data-dismiss="modal">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  $(document).on( "click", ".rejectBtn", function(){
    var theForm = $('#rejectModalForm');
    var theUrl = $(this).data('url') + $(this).data('id');
    theForm.attr('action', theUrl);
  });
  
  $(document).on( "click", ".submitBtn", function(){
    var theForm = $('#rejectModalForm');
    var theURL = theForm.attr("action");
    window.location.href = theURL + "&motiv=" + $('#motivRespingereInput').val();
  });
  
  $(document).on( "click", ".downloadBtn", function(){
    $.ajax({
      type: "POST",
      url: "demandList.php?action=viewDemand&id="+$(this).data('id')
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
                  
  var theTable = $("#demandList").dataTable({
    "bServerSide": true,
    "sAjaxSource": 'demandList.php?action=getData',
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
{$footer}