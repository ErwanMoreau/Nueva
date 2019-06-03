<?php  if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1&error=3');
    
} 
    $transation = $connexion->prepare('SELECT * FROM transaction ');
    $transation->execute();
    $resultattransaction = $transation->fetch(PDO::FETCH_OBJ);
    echo '<pre>';
    var_dump($resultattransaction);
    echo '</pre>';
 

?>

<div class="container-fluid est-height-compte">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class='est-text-h2 est-pos-h2'>Compte Famille</h2>
                <div class="est-bg-somme-compte">
                    <h2 class='est-text-h2 mt-2'></h2>
                </div>
        </div>
    </div>
</div>
    <?php foreach($resultattransaction as $v):?>
        <p><?php $v->pseudo_user; ?></p>
        
    <?php endforeach; ?>
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
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
