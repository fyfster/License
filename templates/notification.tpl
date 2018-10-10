{if $notificationMsg}
{if $notificationMsg neq ''}
  <div class="alert {if $notificationType eq 'error'}alert-danger{elseif $notificationType eq 'success'}alert-success{/if}" style="margin-top: 15px;">
    <div class="right close" data-dismiss="alert"><span class="glyphicon glyphicon-remove"></span></div>
    {$notificationMsg}
  </div>
{/if}
{/if}
