<?php 

require_once "../setting/db.php";
require_once "../setting/autoLoader.php";


$LoadEnclos = new EnclosManager($connexion);

$choice = isset($_POST['choice']) ? $_POST['choice'] : false;

if ($choice) {
    $Enclos = $LoadEnclos->loadEnclos($choice);
} else {
    $Enclos = $LoadEnclos->getAll();
}

// ci dessous pour faire le compte des enclos et ne pas depasser 5 
// a refaire dans le enclosManager !

$prepareSQl = $connexion->prepare("SELECT * FROM enclos");
$prepareSQl->execute();
$test = $prepareSQl->fetchAll(PDO::FETCH_ASSOC);

$compter = count($test);

var_dump($compter);

?>

<!-- lien vers la feuille se style spécifique a la page --> <link rel="stylesheet" href="../style/gestionEnclos.css">

    <!-- DEBUT include la NavBar -->
    
<?php include "../partials/navBar.php"?>

    <!-- FIN include la NavBar -->



<!-- DEBUT formualaire pour créer un enclos -->

    <section id="formulaire_animaux" class="container d-flex text-align-center justify-content-center">
        <div class="">
            <form action="../process/addEnclos.php" method="post">
                <label for="type">savane</label>
                <input type="radio" class="me-3" name="type" value="savane">
                <label for="type">foret</label>
                <input type="radio" class="me-3" name="type" value="foret">
                <label for="type">voliere</label>
                <input type="radio" class="me-3" name="type" value="voliere">
                <label for="type">aquarium</label>
                <input type="radio" class="me-3" name="type" value="aquarium">

                <input type="text" class="m-2" name="name" placeholder="name">

                <input type="hidden" placeholder="isClean" name="isClean" value="0">

                <input type="hidden" placeholder="nbr_animal" name="nbr_animal" value="0">

                <button type="submit" class="btn btn-outline-success">Envoyer</button>
            </form>
        </div>
    </section>

<!-- FIN formualaire pour créer un enclos -->



 <!-- formulaire pour choisir l'enclo a afficher -->

 <section id="select_animaux" class="d-flex justify-content-center">
         
         <div id="recherche" class="input-group mb-3">
             <form method="post">
                 <select name="choice" class="form-select">
                     <option value="1">Choisir</option>
                     <option value="savane">savane</option>
                     <option value="foret">foret</option>
                     <option value="voliere">voliere</option>
                     <option value="aquarium">aquarium</option>
                 </select>
                     <label type="submit" class="input-group-text" for="inputGroupSelect02"><button type="submit">choisir</button></label>
             </form>
         </div>
 
     </section>
     
     <!-- sectionpour afficher la liste choisie avec le select -->
 
     <section id="afficher_animaux" class="d-flex justify-content-center align-items-center flex-column">
         <div class="row">
             <h2>liste des Enclos</h2>
         </div>
         <div class="row">
             <?php foreach ($Enclos as $key) { ?>
                 
                 <div class="photoEnclos col-4" style="background-image: url(../images/<?=$key->getType()?>.jpeg);">
                     <div class="EnclotName">
                         <?=$key->getName()?>
                     </div>
                     <ul>
                         <li class="texte-light fs-2"><?=$key->getType()?></li>
                         <li class="texte-light fs-2"><?=$key->getNbrAnimal() . " animaux a l'interieur"?></li>
                         <li class="texte-light fs-2"><?=$key->getIsClean() . " propre"?></li>
                     </ul>
                     <a class="btn btn-danger" href="./detialEnclos.php?idEnclos=<?=$key->getId()?>">Voir en detail</a>
                 </div>
                 
             <?php }?>
         </div>
 
     </section>
 <!-- FIN afficher les animaux existant -->





    <!-- DEBUT include la Footer -->
    
<?php include "../partials/Footer.php"?>

    <!-- FIN include la Footer -->