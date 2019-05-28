<?php  if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1&error=3');
    
} ?>

<div class="container-fluid est-height-compte">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class='est-text-h2 est-pos-h2'>Compte Famille</h2>
                <div class="est-bg-somme-compte">
                    <h2 class='est-text-h2 mt-2'><?= $compte['value'];?></h2>
                </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="index.php?id=10" class='btn btn-primary est-pos-btn'>Ajouter une transaction</a>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Identité</th>
                    <th scope="col">Informations</th>
                    <th scope="col">Somme</th>
                    <th scope="col">Date</th>
                    <th scope="col">Editer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaction as $v):?>
                    <tr>
                    <th scope="row"><?= $v->id?></th>
                    <td><?= $v->pseudo?>/td>
                    <td><?= $v->description?></td>
                    <td><?= $v->value?></td>
                    <td><?= $v->create_time?></td>
                    <td><a href="index.php?id=11&id_tran=<?= $v->id?>">Edit</a></td>
                    </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
