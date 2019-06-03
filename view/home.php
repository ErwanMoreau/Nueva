<?php 
?>
<div class="est-bg-connexion-img">
  <div class="container-fluid">
    <div class="container">
      <img src="image/cosa_nostra.png" class='est-pos-img-cosa' alt="">
      <div class="est-bg-connexion">
        <div class="row mt-5">
          <div class="col-md-12 text-center">
            <h2 class='est-text-connexion'>Connexion</h2>
          </div>
        </div>
      <form action="index.php?id=100" method="post">
          <div class="form-row ml-5 mr-5 mb-5 mt-4">
                    <div class="form-group col-md-12 mt-3">
                      <label for="email">E-mail ou Pseudo</label>
                      <input type="email" class="form-control" id="email" name="email">
                    </div>
                  </div>
                  <div class="form-row ml-5 mr-5 mb-5 mt-4">
                    <div class="form-group col-md-12">
                      <label for="password">Mot de passe</label>
                      <input type="password" class="form-control" id="password" name="password">
                      <div class="mt-2">
                        <a href='' class='est-lien-connexion mr-5'>Mot de passe oublié</a><a href='index.php?id=22' class='est-lien-connexion ml-5'>S'inscrire</a>
                      </div>
                      <div class="form-check" id='stayConnect'>
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name='gridCheck1' value="1">
                          <label class="form-check-label" for="gridCheck1">
                            Rester identifié
                          </label>
                      </div>
                    </div>
                  </div> 
                  <div class="form-row  text-center">
                    <div class="form-group col-md-12">
                      <button class='btn btn-primary est-btn-connexion'>Connexion</button>
                    </div>
      </form> 
        
          
        </div>  
      </div>
    </div>
  </div>
</div>
