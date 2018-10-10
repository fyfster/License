{$header}
{$notification}
  <form action="new_user.php?action=createUser" method="POST">
    <div class="row" style="margin-top: 20px;">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Informatii necesare pentru logarea utilizatorului (informatii obligatorii)
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Nume utilizator</label>
              <input type="text" class="form-control" name="username"{if $user} value="{$user['username']}" {/if}>
            </div>
            <div class="form-group">
              <label>Adresa email</label>
              <input type="email" class="form-control" name="email"{if $user} value="{$user['email']}" {/if}>
            </div>
            <div class="form-group">
              <label>Parola</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
              <label>Confirmare parola</label>
              <input type="password" class="form-control" name="password2">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="panel panel-info">
        <div class="panel-heading">
          Informatii necesare pentru eventualele cereri/plangeri
        </div>
        <div class="panel-body">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nume intreg</label>
              <input type="text" class="form-control" name="name"{if $user} value="{$user['name']}" {/if}>
            </div>
            <div class="form-group">
              <label>Telefon</label>
              <input type="text" class="form-control" name="phone"{if $user} value="{$user['phone']}" {/if}>
            </div>
            <div class="form-group">
              <label>Strada</label>
              <input type="text" class="form-control" name="streetName"{if $user} value="{$user['streetName']}" {/if}>
            </div>
            <div class="form-group">
              <label>Apartament</label>
              <input type="text" class="form-control" name="apartment"{if $user} value="{$user['apartment']}" {/if}>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Cnp</label>
              <input type="text" class="form-control" name="cnp"{if $user} value="{$user['cnp']}" {/if}>
            </div>
            <div class="form-group">
              <label>Judet</label>
              <input type="text" class="form-control" name="region"{if $user} value="{$user['region']}" {/if}>
            </div>
            <div class="form-group">
              <label>Oras</label>
              <input type="text" class="form-control" name="city"{if $user} value="{$user['city']}" {/if}>
            </div>
            <div class="form-group">
              <label>Numar strada</label>
              <input type="text" class="form-control" name="streetNumber"{if $user} value="{$user['streetNumber']}" {/if}>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-left: -15px;">Inregistrare</button>
  </form>
{$footer}
  
