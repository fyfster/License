{$header}
{$notification}
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-primary" style="margin-top: 20px;">
      <div class="panel-heading">
        Cereri
      </div>
      <div class="panel-body">
        <input type="hidden" id="nrAccepteDemands" value="{$nrAccepteDemands}" />
        <input type="hidden" id="nrRejectedDemands" value="{$nrRejectedDemands}" />
        <input type="hidden" id="nrPendingDemands" value="{$nrPendingDemands}" />
        <div class"form-group">
          <h3>Total cereri: {$totalDemands}</h3>
          <h4 style="color: #1F7A1F;">Cereri acceptate: {$nrAccepteDemands}</h4>
          <h4 style="color: #F7464A;">Cereri respinse: {$nrRejectedDemands}</h4>
          <h4 style="color: #008AE6;">Cereri in curs de procesare: {$nrPendingDemands}</h4>
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
        <input type="hidden" id="nrResolvedComplaints" value="{$nrResolvedComplaints}" />
        <input type="hidden" id="nrPendingComplaints" value="{$nrPendingComplaints}" />
        <div class"form-group">
          <h3>Total plangeri: {$totalComplaints}</h3>
          <h4 style="color: #1F7A1F;">Plangeri rezolvate: {$nrResolvedComplaints}</h4>
          <h4 style="color: #008AE6;">Plangeri in curs de procesare: {$nrPendingComplaints}</h4>
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

{$footer}