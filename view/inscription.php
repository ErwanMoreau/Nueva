<div class='container-fluid'>
        <div class='container'>
          <div class='row'>
            <div class='col-md-12 col-sm-12 '>
                <form action='index.php?id=107' method='post' id='inscription'>
                        <p class='est-form-text'>*Champs obligatoire</p>
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">Email*</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name='email_inscription' value='<?= $_POST['mail']?>'>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Mot de passe*</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Mot de passe" name='password_inscription'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Pseudonyme*</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Pseudo" name='pseudo'>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Date de Naissance*</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="00/00/0000" name='birthday'>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">Nom*</label>
                        <input type="text" class="form-control" id="inputlastname" name='lastname'>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputState">Prénom*</label>
                        <input type="text" class="form-control" id="inputfirstname" name='firstname'>
                            
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            J'accepte les conditions général
                        </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </form>
 
          </div>
        </div>
      </div>
  </div>