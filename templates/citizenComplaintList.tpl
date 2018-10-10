{$header}
{$notification}
<div class="panel panel-primary" style="margin-top: 20px;">
  <div class="panel-heading">
    Lista cu toate plangerile facute
  </div>
  <div class="panel-body table-responsive">
    <table id="complaintList" class="table table-condensed table-bordered table-corespondenta table-striped table-responsive">
      <thead>
      <tr>
        <th><label style="font-size: 14px;">Nume document</label></th>
        <th style="width: 115px;"><label style="font-size: 14px;">Data depunere</label></th>
        <th style="width: 115px;"><label style="font-size: 14px;">Stare</label></th>
      </tr>
      </thead>
      <tbody>
        {foreach from=$theTableData key=k item=theDoc}
          <tr>
            <td>{$theDoc->getFormName()}</td>
            <td>{date_format($theDoc->getRegisterDate(), 'd/m/Y')}</td>
            <td style="width: 165px;">
              {if $theDoc->getStatus() eq 'Pending'}
                 <span>In curs de procesare</span>
              {/if}
              {if $theDoc->getStatus() eq 'Resolved'}
                 <span style="color: green">Resolvata</span>
              {/if}
            </td>
          </tr>
        {/foreach}
      </tbody>
    </table>
  </div>
</div>
{$footer}