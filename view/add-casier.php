<div class="container-fluid mt-5">
  <div class="container">
    <form action="index.php?id=105" method="POST">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-12">
              <h1 class="customTitleCard">Nouveaux Casier</h1>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="firstname">Prénom</span>
                </div>
                <input type="text" class="form-control" name="prenom" placeholder="prénom" aria-label="firstname" aria-describedby="firstname" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="lastname">Nom</span>
                </div>
                <input type="text" class="form-control" name="nom" placeholder="nom" aria-label="lastname" aria-describedby="lastname" required>
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button (click)="generate()" class="btn btn-outline-primary" type="button" id="numerosCasier">Numéros de Casier</button>
                </div>
                <input type="text" id="numberCasier" name="number" class="form-control" placeholder="" aria-label="numerosCasier" aria-describedby="numerosCasier" readonly required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="addon-telephone">Numéros de téléphone</span>
                </div>
                <input type="text" class="form-control" name="telephone" placeholder="numéros de téléphone" aria-label="telephone" aria-describedby="addon-telephone">
              </div>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-12 ">
              <div class="trumbowyg">
                <div id="editor"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-md-12 customTAR">
              <button type="submit" class="btn btn-primary ">Nouveaux Casier</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
