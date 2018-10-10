{$header}
{$notification}
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
{$footer}