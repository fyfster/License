{$header}
{$notification}
<div class="panel panel-primary" style="margin-top: 20px;">
  <div class="panel-heading">
    Lista cu toate cererile facute
  </div>
  <div class="panel-body table-responsive">
    <table id="demandList" class="table table-condensed table-bordered table-corespondenta table-striped">
      <thead>
      <tr>
        <th style="min-width: 175px;"><label style="font-size: 14px;">Nume document</label></th>
        <th style="width: 115px;"><label style="font-size: 14px;">Data depunere</label></th>
        <th style="min-width: 165px;"><label style="font-size: 14px;">Stare</label></th>
        <th style="width: 200px;"><label style="font-size: 14px;">Motiv</label></th>
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
              {if $theDoc->getStatus() eq 'Accepted'}
                 <span style="color: green">Acceptat</span>
              {/if}
              {if $theDoc->getStatus() eq 'Rejected'}
                 <span style="color: red">Respins</span>
              {/if}
            </td>
            <td>
              {$theDoc->getMotiv()}
            </td>
          </tr>
        {/foreach}
      </tbody>
    </table>
  </div>
</div>
{$footer}