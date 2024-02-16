<?php 

require_once "../setting/db.php";
require_once "../setting/autoLoader.php";


$Newanimal = new AnimauxManager($connexion);
$LoadEnclos = new EnclosManager($connexion);

$choice = isset($_POST['choice']) ? $_POST['choice'] : false;
if ($choice) {
    $animals = $Newanimal->loadAnimals($choice);
} else {
    $animals = $Newanimal->loadAll();
}

$enclos = $LoadEnclos->getAll();

// test 


// $animauxidenclos = $Newanimal->AnimalByEnclos($choice);


// var_dump($choice);

    // avoir tout les enclos existant pour le select

// echo "<pre>";
// var_dump($enclos);
// echo "</pre>";


// fin des test


?>

<!-- Lien de ma feuille de style specifique a ma page --><link rel="stylesheet" href="../style/gestion_animaux_style.css">
   

<!-- DEBUT include la NavBar -->

    <?php include "../partials/navBar.php"?>

<!-- FIN include la NavBar -->



<!-- DEBUT formualaire pour créer un animal -->

    <section id="formulaire_animaux" class="container d-flex text-align-center justify-content-center">
        <div class="">
            <form action="../process/addAnimal.php" method="post">
                <label for="type">tigre</label>
                <input type="radio" class="me-3" name="espece" value="tigre">
                <label for="type">ours</label>
                <input type="radio" class="me-3" name="espece" value="ours">
                <label for="type">aigle</label>
                <input type="radio" class="me-3" name="espece" value="aigle">
                <label for="type">requin</label>
                <input type="radio" class="me-3" name="espece" value="requin">

                <input type="text" class="m-2" name="name" placeholder="name">

                <input type="hidden" placeholder="faim" name="faim" value="0">

                <input type="hidden" placeholder="fatigue" name="fatigue" value="0">

                <input type="number" class="m-2" placeholder="poids" name="poids" value="" min="0" max="">

                <input type="number" class="m-2" placeholder="taille"  name="taille" value="" min="0">

                <input type="hidden" placeholder="malade" name="malade" value="0">

                <select name="enclos" id="">
                    <option value=""></option>
                    <?php foreach ($enclos as $value) { ?>
                        <option value="<?=$value->getId()?>"><?=$value->getName()?></option>
                    <?php }?>
                </select>

                <button type="submit" class="btn btn-outline-success">Envoyer</button>
            </form>
        </div>
    </section>
    
<!-- FIN formualaire pour créer un animal -->


<!-- DEBUT afficher les animaux existant -->

    <!-- formulaire pour choisir l'espece a afficher -->

    <section id="select_animaux" class="d-flex justify-content-center">
         
        <div id="recherche" class="input-group mb-3">
            <form method="post">
                <select name="choice" class="form-select">
                    <option value="1">Choisir</option>
                    <option value="tigre">tigre</option>
                    <option value="ours">ours</option>
                    <option value="aigle">aigle</option>
                    <option value="requin">requin</option>
                </select>
                    <label type="submit" class="input-group-text" for="inputGroupSelect02"><button type="submit">choisir</button></label>
            </form>
        </div>

    </section>
    
    <!-- sectionpour afficher la liste choisie avec le select -->

    <section id="afficher_animaux" class="d-flex justify-content-center align-items-center flex-column">
        <div class="row">
            <h2>liste des animaux</h2>
        </div>
        <div class="row test">
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

    </section>
<!-- FIN afficher les animaux existant -->
  

<!-- DEBUT include la Footer -->
    
    <?php include "../partials/Footer.php"?>

<!-- FIN include la Footer -->