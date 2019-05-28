
<div class='container-fluid est-bg-connexion' id='menu-connect'>
  <div class='container'>
    <form action='index.php?id=100' method='post' id='connect' >
                  
      <div class="form-group row mt-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label text-center">Votre nom ou adresse email:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name='mail'>
          </div>
      </div>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-center">Avez-vous déjà un compte ?</legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" >
                <label class="form-check-label" for="gridRadios1">
                  Non, créez-en un maintenant.
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2" checked>
                  <label class="form-check-label" for="gridRadios2">
                    Oui, mon mot de passe est:
                  </label>
              </div>

            </div>
        </div>
      </fieldset>
        <div class="form-group row">
          <div class="col-sm-10 col-md-10 offset-md-2 offset-sm-2">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name='password'>
          </div>

          <div class="col-sm-10 offset-sm-2 col-md-10 offset-md-2">
            <div class="form-check" id='stayConnect'>
              <input class="form-check-input" type="checkbox" id="gridCheck1" name='gridCheck1' value="1">
                <label class="form-check-label" for="gridCheck1">
                  Rester identifié
                </label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10 offset-sm-2 cols-md-10 offset-md-2">
            <button type="submit" class="btn btn-primary" id='btn-connect'>Connexion</button>
          </div>
      </div>
    </form>         
  </div>
</div>
<div class="container-fluid mb-5 est-pos-abso" id='button-connect'>
  <div class="container">
    <div class='col-md-12 text-right'>
      <button class='btn btn-success btn-success-inscription'>s'inscrire ou s'identifier</button>
    </div> 
  </div>
</div>
