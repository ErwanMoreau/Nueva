<?php 
    require './app/bdd.php';

    $id_rapport = $_GET['id_rapport'];
    $sql = $connexion->prepare('SELECT * FROM rapport, user where rapport.id= :id_rapport AND rapport.id_user = user.id');
    $sql->bindValue(':id_rapport', $id_rapport,PDO::PARAM_INT);
    $sql->execute();
    $resultat = $sql->fetch(PDO::FETCH_ASSOC);

?>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="customTitle"><?= $resultat['title'] ?></h1>
                    <!-- <h1 class="customTitle">Rapport d'arrestation de Lucien Myuer</h1> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h2 class="customTitleRapport">
                                Rapport: 
                            </h2>
                            <p><?= $resultat['contenue'] ?></p>
                            <!-- <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta aperiam ratione placeat provident optio nisi, quis nihil asperiores voluptatibus, quae officia voluptatum fugiat quisquam molestiae omnis aliquid odio maiores laboriosam.
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto, ex, voluptates velit dolores quisquam aliquid fugiat aperiam omnis repellendus autem provident temporibus est laborum excepturi reiciendis saepe ducimus. Modi, molestias?
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur aperiam asperiores mollitia sapiente et maxime in, voluptatem possimus, culpa deserunt aspernatur perferendis alias blanditiis adipisci. Tenetur, magni? Repellendus, delectus voluptates?
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore asperiores quos quam nemo est hic laudantium consequuntur tempora, necessitatibus inventore blanditiis saepe praesentium accusamus minima eius veritatis repellat illo voluptatum!
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt iusto optio velit autem, excepturi quaerat perspiciatis odio neque in quis illo sint vitae eligendi minima sequi quasi esse. Voluptates, neque?
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, architecto amet. Magnam consequatur dolorem sit ut iste asperiores vel, deleniti animi maxime facere beatae facilis eum non quisquam sequi voluptatem?
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis maxime vel voluptatem consequatur quae labore quia impedit aliquid eveniet rerum magni, nobis totam animi, ullam ipsum saepe nihil omnis veritatis!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo eos nulla non aperiam commodi. Debitis ex, modi, magnam quidem minus officia illum beatae id sapiente nesciunt saepe tempore? Quam, doloribus.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia atque corrupti, assumenda, illum mollitia, placeat voluptatum et expedita quis magnam explicabo! Earum, debitis vitae repellat doloribus et natus aliquid facere.

                            </p> -->
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-4">
                            <span>Ecrit par: <?= $resultat['matricule'] ?> le <?= $resultat['create_at'] ?></span>
                            <!-- <span>Ecrit par: Agent Palacio le 12/12/2019 à 19:53</span> -->
                        </div>
                        <?php if($_SESSION['acces']['id_user'] === $resultat['id_user']):?>

                        <div class="col-md-8 customTAR">
                            <a href="index.php?id=120&id_rapport=<?= $_GET['id_rapport'] ?>" class="btn btn-primary"> Editer le rapport</a>
                        </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>