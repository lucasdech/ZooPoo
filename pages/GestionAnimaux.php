<?php 

require_once "../setting/db.php";
require_once "../setting/autoLoader.php";
require_once "../setting/messages.php";

$Newanimal = new AnimauxManager($connexion);
$Newanimal->loadAnimals();

?>

<!-- Lien de ma feuille de style specifique a ma page --><link rel="stylesheet" href="../style/gestion_animaux_style.css">
   

<!-- DEBUT include la NavBar -->
    
    <?php include "../partials/navBar.php"?>

<!-- FIN include la NavBar -->



<!-- DEBUT formualaire pour créer un animal -->

    <section id="formulaire_animaux" class="container d-flex text-align-center justify-content-center">
        <div class="">
            <form action="../process/addAnimal.php" method="post">
                <label for="type">titre</label>
                <input type="radio" class="me-3" name="type_off" value="tigre">
                <label for="type">ours</label>
                <input type="radio" class="me-3" name="type_off" value="ours">
                <label for="type">aigle</label>
                <input type="radio" class="me-3" name="type_off" value="aigle">
                <label for="type">requin</label>
                <input type="radio" class="me-3" name="type_off" value="requin">

                <input type="text" class="m-2" name="name" placeholder="name">

                <input type="hidden" placeholder="faim" name="faim" value="0">

                <input type="hidden" placeholder="fatigue" name="fatigue" value="0">

                <input type="number" class="m-2" placeholder="poids" name="poids" value="" min="0" max="">

                <input type="number" class="m-2" placeholder="taille"  name="taille" value="" min="0">

                <input type="hidden" placeholder="malade" name="malade" value="0">

                <input type="number" class="m-2" placeholder="enclos" name="enclos" value="1">

                <button type="submit" class="btn btn-outline-success">Envoyer</button>
            </form>
        </div>
    </section>
    
<!-- FIN formualaire pour créer un animal -->


<!-- DEBUT afficher les animaux existant -->

    <section id="select_animaux" class="d-flex justify-content-center">
         
        <div id="recherche" class="input-group mb-3">
            <form action="../process/searchAnimals.php" method="post">
                <select name="choice" class="form-select">
                    <option value="1">Choisir</option>
                    <option value="2">tigre</option>
                    <option value="3">ours</option>
                    <option value="4">aigle</option>
                    <option value="5">requin</option>
                </select>
                    <label type="submit" class="input-group-text" for="inputGroupSelect02"><button type="submit">choisuir</button></label>
            </form>
        </div>

    </section>
    

    <section id="afficher_animaux" class="d-flex justify-content-center">

        <div class="">
            <?php foreach ($Newanimal as $key) {
                echo "salut";
            }
            ?>
        </div>

    </section>
<!-- FIN afficher les animaux existant -->
  

<!-- DEBUT include la Footer -->
    
    <?php include "../partials/Footer.php"?>

<!-- FIN include la Footer -->