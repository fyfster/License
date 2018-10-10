{$header}
{$notification}
  <form action="edit_user.php?action=editUser&id={$user->getId()}" method="POST">
    <div class="row" style="margin-top: 20px;">
      <div class="panel panel-danger">
        <div class="panel-heading">
          Pentru a face orice modificare la cont este necasar sa introduceti parola in campul "Parola curenta".
        </div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          Informatii necesare pentru logarea utilizatorului (informatii obligatorii)
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Nume utilizator</label>
              <input type="text" class="form-control" disabled name="username" value="{$user->getUsername()}" >
            </div>
            <div class="form-group">
              <label>Adresa email</label>
              <input type="email" class="form-control" disabled name="email" value="{$user->getEmail()}" >
            </div>
            <div class="form-group">
              <label>Parola curenta</label>
              <input type="password" class="form-control" name="oldPassword">
            </div>
            <div class="form-group">
              <label>Parola noua</label>
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
              <input type="text" class="form-control" name="name"{if $user} value="{$user->getName()}" {/if}>
            </div>
            <div class="form-group">
              <label>Telefon</label>
              <input type="text" class="form-control" name="phone"{if $user} value="{$user->getPhone()}" {/if}>
            </div>
            <div class="form-group">
              <label>Strada</label>
              <input type="text" class="form-control" name="streetName"{if $user} value="{$user->getStreetName()}" {/if}>
            </div>
            <div class="form-group">
              <label>Apartament</label>
              <input type="text" class="form-control" name="apartment"{if $user} value="{$user->getApartment()}" {/if}>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Cnp</label>
              <input type="text" class="form-control" name="cnp"{if $user} value="{$user->getCnp()}" {/if}>
            </div>
            <div class="form-group">
              <label>Judet</label>
              <input type="text" class="form-control" name="region"{if $user} value="{$user->getRegion()}" {/if}>
            </div>
            <div class="form-group">
              <label>Oras</label>
              <input type="text" class="form-control" name="city"{if $user} value="{$user->getCity()}" {/if}>
            </div>
            <div class="form-group">
              <label>Numar strada</label>
              <input type="text" class="form-control" name="streetNumber"{if $user} value="{$user->getStreetNumber()}" {/if}>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-left: -15px;">Modificare</button>
    <a href="index.php" class="btn btn-primary" style="margin-left: 15px;">Cancel</a>
  </form>
{$footer}
  
