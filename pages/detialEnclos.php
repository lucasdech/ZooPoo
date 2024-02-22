<?php 

require_once "../setting/db.php";
require_once "../setting/autoLoader.php";

$idEnclos = $_GET['idEnclos'];

$LoadEnclos = new EnclosManager($connexion);
$animalManager = new AnimauxManager($connexion);

$enclos = $LoadEnclos->getById($idEnclos);
$animals = $animalManager->AnimalByEnclos($enclos->getId());
$enclos->setAnimalArray($animals);

include "../partials/navBar.php"

?>

<!-- lien vers la feuille se style spécifique a la page --> <link rel="stylesheet" href="../style/detailEnclos.css">




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
                                <div>
                                    <img src="../images/<?=$key->getEspece()?>.png" height="100px" alt="">
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?=$key->getEspece()?></li>
                                    <li class="list-group-item"><?=$key->getTaille() . " cm"?></li>
                                    <li class="list-group-item"><?=$key->getPoids() . " Kg"?></li>
                                    <li class="list-group-item"><? if ($key->getFaim() == 0) {
                                                                        echo $key->getName() . " n'a pas faim";
                                                                    }elseif ($key->getFaim() == 1) {
                                                                        echo $key->getName() . " a faim !";
                                                                    }elseif ($key->getFaim() == 2) {
                                                                        echo $key->getName() . " est affamé !!!";
                                        }?></li>
                                    <li class="list-group-item"><? if ($key->getMalade() == 0) {
                                                                        echo $key->getName() . " n'est pas Malade";
                                                                    }elseif ($key->getMalade() == 1) {
                                                                        echo $key->getName() . " est Malade !";
                                                                    }?></li>
                                    <a href="../process/NourirAnimaux.php?IdAnimal=<?=$key->getId()?>" class="btn btn-success">nourir</a>
                                    <button class="btn btn-primary">soigner</button>
                                    <a href="../process/deleteAnimal.php?IdAnimal=<?=$key->getId()?>" class="btn btn-danger">supprimer l'Animal</a>
                                    
                                </ul>
                            </div>
                        <?php }?>
                    </div>

                    <div class="bg bg-white">
                        <p><?   if ($enclos->getIsClean() < 3) {
                                    echo "l'enclos est propre";
                                }else{
                                    echo "l'enclos n'est pas propre ! Penser a le nettoyer... ";
                                }
                            ?>
                        </p> 
                    </div>
                    <div class="">
                        <a class="btn btn-primary" href="../process/CleanEnclos.php?idEnclos=<?=$enclos->getId()?>">nettoyer l'enclos</a>
                        <a class="btn btn-danger">supprimer l'enclos</a>
                        <a class="btn btn-success" href="../pages/GestionEnclos.php">retourner au enclos</a>
                    </div>
                </div>
            </div>
    </section>


    <!-- FIN section d'affichage des enclos avec les animaux dedans -->


    
    <!-- DEBUT include la Footer -->
    
    <?php include "../partials/Footer.php"?>

    <!-- FIN include la Footer -->