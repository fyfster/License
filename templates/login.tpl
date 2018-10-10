{$header}
<div class="panel-login">
  <div class="panel panel-primary ">
    <div class="panel-heading">
      <header>
        <div class="panel-title">Autentificare</div>
      </header>
    </div>
    <div class="panel-body">
      <form class="form-signin" action="?action=login" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Nume utilizator" name="userName">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Parola" name="password">
        </div>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Logare</button>
      </form>
    </div>
  </div>
</div>
{$footer}