<?php
if( !isset($_SESSION['acces'])){
    header('Location: index.php?id=1');
}
require './app/bdd.php';

    $civl = $connexion->prepare('SELECT * FROM amende WHERE id_category = 1 AND isDelete = 0');
    $civl->execute();
    $resultatCivil = $civl->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row mt-4">
    <div class="col-md-12 customTAC">
        <h1 class="customTitle"> Code civil</h1>
    </div>
</div>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Infraction</th>
            <th scope="col">classification</th>
            <th scope="col">contravention</th>
            <th scope="col">Complement d'information</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $numb = 1;
    foreach ($resultatCivil as $key):?>
        <tr>
            <th scope="row"><?=$numb?></th>
            <td><?= $key['infraction'] ?></td>
            <td><?= $key['classification'] ?></td>
            <td><?= $key['contravention'] ?></td>
            <td><?= $key['complement'] ?></td>
            <td>
            <?php if( isset($_SESSION['acces+'])):?>
                <a href="index.php?id=17&id_amende=<?=$key['id_amende'] ?>"> 
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 528.899 528.899" style="enable-background:new 0 0 528.899 528.899;" xml:space="preserve"><g><g>
                        <path d="M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981   c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611   C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069   L27.473,390.597L0.3,512.69z" data-original="#000000" class="active-path" fill="#000000"/>
                        </g></g> 
                    </svg>
                </a>
            <?php endif?>        
            </td>
        </tr>
    <?php $numb++; endforeach ?>

    </tbody>
</table>
<?php
    $justice = $connexion->prepare('SELECT * FROM amende WHERE id_category = 2 AND isDelete = 0');
    $justice->execute();
    $resultatJustice = $justice->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="row mt-4">
    <div class="col-md-12 customTAC">
        <h1 class="customTitle"> Code de justice administrative</h1>
    </div>
</div>
<table class="table">
    <thead class="thead-dark">
    <tr>
            <th scope="col">#</th>
            <th scope="col">Infraction</th>
            <th scope="col">classification</th>
            <th scope="col">contravention</th>
            <th scope="col">Complement d'information</th>
            <th scope="col">Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $numb1 = 1;
    foreach ($resultatJustice as $key):?>
        <tr>
            <th scope="row"><?=$numb1?></th>
            <td><?= $key['infraction'] ?></td>
            <td><?= $key['classification'] ?></td>
            <td><?= $key['contravention'] ?></td>
            <td><?= $key['complement'] ?></td>
            <td>
            <?php if( isset($_SESSION['acces+'])):?>
                <a href="index.php?id=17&id_amende=<?=$key['id_amende'] ?>"> 
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 528.899 528.899" style="enable-background:new 0 0 528.899 528.899;" xml:space="preserve"><g><g>
                        <path d="M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981   c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611   C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069   L27.473,390.597L0.3,512.69z" data-original="#000000" class="active-path" fill="#000000"/>
                        </g></g> 
                    </svg>
                </a>
            <?php endif?> 
            </td>
        </tr>
    <?php $numb1++;  endforeach ?>

    </tbody>
</table>
<div class="row mt-4">
    <div class="col-md-12 customTAC">
        <h1 class="customTitle"> code de protection du travailleur</h1>
    </div>
</div>
<?php
    $travail = $connexion->prepare('SELECT * FROM amende WHERE id_category = 3 AND isDelete = 0');
    $travail->execute();
    $resultatTravail = $travail->fetchAll(PDO::FETCH_ASSOC);

?>
<table class="table">
    <thead class="thead-dark">
    <tr>
            <th scope="col">#</th>
            <th scope="col">Infraction</th>
            <th scope="col">classification</th>
            <th scope="col">contravention</th>
            <th scope="col">Complement d'information</th>
            <th scope="col">Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $numb2 = 1;
    foreach ($resultatTravail as $key):?>
        <tr>
            <th scope="row"><?=$numb2?></th>
            <td><?= $key['infraction'] ?></td>
            <td><?= $key['classification'] ?></td>
            <td><?= $key['contravention'] ?></td>
            <td><?= $key['complement'] ?></td>
            <td>
            <?php if( isset($_SESSION['acces+'])):?>
                <a href="index.php?id=17&id_amende=<?=$key['id_amende'] ?>"> 
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 528.899 528.899" style="enable-background:new 0 0 528.899 528.899;" xml:space="preserve"><g><g>
                        <path d="M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981   c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611   C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069   L27.473,390.597L0.3,512.69z" data-original="#000000" class="active-path" fill="#000000"/>
                        </g></g> 
                    </svg>
                </a>
            <?php endif?> 
            </td>
        </tr>
    <?php $numb2++; endforeach ?>

    </tbody>
</table>
<div class="row mt-4">
    <div class="col-md-12 customTAC">
        <h1 class="customTitle"> Code de procédure</h1>
    </div>
</div>
<?php
    $procedure = $connexion->prepare('SELECT * FROM amende WHERE id_category = 4 AND isDelete = 0');
    $procedure->execute();
    $resultatProcedure = $procedure->fetchAll(PDO::FETCH_ASSOC);

?>
<table class="table">
    <thead class="thead-dark">
    <tr>
            <th scope="col">#</th>
            <th scope="col">Infraction</th>
            <th scope="col">classification</th>
            <th scope="col">contravention</th>
            <th scope="col">Complement d'information</th>
            <th scope="col">Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $numb3 = 1;
    foreach ($resultatProcedure as $key):?>
        <tr>
            <th scope="row"><?=$numb3?></th>
            <td><?= $key['infraction'] ?></td>
            <td><?= $key['classification'] ?></td>
            <td><?= $key['contravention'] ?></td>
            <td><?= $key['complement'] ?></td>
            <td>
            <?php if( isset($_SESSION['acces+'])):?>
                <a href="index.php?id=17&id_amende=<?=$key['id_amende'] ?>"> 
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 528.899 528.899" style="enable-background:new 0 0 528.899 528.899;" xml:space="preserve"><g><g>
                        <path d="M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981   c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611   C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069   L27.473,390.597L0.3,512.69z" data-original="#000000" class="active-path" fill="#000000"/>
                        </g></g> 
                    </svg>
                </a>
            <?php endif?> 
            </td>
        </tr>
    <?php $numb3++; endforeach ?>

    </tbody>
</table>