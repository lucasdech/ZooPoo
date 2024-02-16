<?php 

require_once "../setting/db.php";
require_once "../setting/autoLoader.php";

$idEnclos = $_GET['idEnclos'];

$LoadEnclos = new EnclosManager($connexion);
$animalManager = new AnimauxManager($connexion);

$enclos = $LoadEnclos->getById($idEnclos);
$animals = $animalManager->AnimalByEnclos($enclos->getId());
$enclos->setAnimalArray($animals);
var_dump($enclos);
?>

<!-- lien vers la feuille se style spécifique a la page --> <link rel="stylesheet" href="../style/detailEnclos.css">


    <!-- DEBUT include la NavBar -->
    
    <?php include "../partials/navBar.php"?>

    <!-- FIN include la NavBar -->



    <!-- DEBUT section d'affichage des enclos avec les animaux dedans -->


    <section class="d-flex H-100 align-items-center justify-content-center">
            <div class="boite">
                <div class="imageFond" style="background-image: url(../images/<?=$enclos->getType()?>.jpeg);">
                    <div class="d-flex flex-row">
                    <?php foreach ($animals as $key) { ?>
                
                <div class="card m-3" style="width: 18rem;">
                    <div class="card-header">
                        <?=$key->getName()?>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?=$key->getEspece()?></li>
                        <li class="list-group-item"><?=$key->getTaille() . " cm"?></li>
                        <li class="list-group-item"><?=$key->getPoids() . " Kg"?></li>
                        <li class="list-group-item"><?=$key->getFaim() . " faim"?></li>
                        <li class="list-group-item"><?=$key->getMalade() . " malade"?></li>
                        <li class="list-group-item"><?=$key->getFatigue() . " fatigué"?></li>
                        <li class="list-group-item"><?=$key->getEspece()?></li>
                        <li class="list-group-item"><?="Enclos n° " . $key->getEnclosId()?></li>
                    </ul>
                </div>
                
            <?php }?>
                    </div>
                    <div>
                        <button class="btn btn-success">nourir les animaux</button>
                        <button class="btn btn-primary">nettoyer lenclos</button>
                        <button class="btn btn-danger">supprimer lenclos</button>
                    </div>
                </div>
            </div>
    </section>


    <!-- FIN section d'affichage des enclos avec les animaux dedans -->


    
    <!-- DEBUT include la Footer -->
    
    <?php include "../partials/Footer.php"?>

    <!-- FIN include la Footer -->