<?php 

require_once "../setting/db.php";
require_once "../setting/autoLoader.php";

?>


<!-- Lien de ma feuille de style specifique a ma page --><link rel="stylesheet" href="../style/gestion_animaux_style.css">
   

<!-- DEBUT include la NavBar -->
    
    <?php include "../partials/navBar.php"?>

    <!-- FIN include la NavBar -->



    <!-- DEBUT formualaire pour créer un animal -->

    <section id="formulaire_animaux" class="container d-flex text-align-center justify-content-center">
        <div class="">
            <form action="../classes/AnimauxManager.php" method="post">
                <label for="type">tigre</label>
                <input type="radio" class="me-3" name="type_off">
                <label for="type">ours</label>
                <input type="radio" class="me-3" name="type_off">
                <label for="type">aigle</label>
                <input type="radio" class="me-3" name="type_off">
                <label for="type">requin</label>
                <input type="radio" class="me-3" name="type_off">

                <input type="text" class="m-2" placeholder="name" value="">
                <input type="hidden" placeholder="faim" value="">
                <input type="hidden" placeholder="fatigue" value="">
                <input type="number" class="m-2" placeholder="poids" value="" min="0.1" max="">
                <input type="number" class="m-2" placeholder="taille" value="" min="0">
                <input type="hidden" placeholder="maladie" value="">
                <input type="text" class="m-2" placeholder="enclos" value="">

                <button type="submit" class="btn btn-outline-success">Success</button>
            </form>
        </div>
    </section>
    <!-- FIN formualaire pour créer un animal -->


  <!-- DEBUT afficher les animaux existant -->

    <section id="select_animaux" class="d-flex justify-content-center">
         
        <div id="recherche" class="input-group mb-3">
        <!-- PEUT ETRE A PLACER DANS UN FORMULAIRE POUR SELECTIONNER EN FONCTION DE LESPECE TOUT LES ANIMAUX  -->   
                <select class="form-select">
                    <option value="1">tigre</option>
                    <option value="2">ours</option>
                    <option value="3">aigle</option>
                    <option value="3">requin</option>
                </select>
                    <label class="input-group-text" for="inputGroupSelect02">choisir</label>
        </div>

    </section>
    

    <section id="afficher_animaux" class="d-flex justify-content-center">

        <div class="">
            <h1>afficher ici les animaux existant en fonction de leurs Espece</h1>
        </div>

    </section>
  <!-- FIN afficher les animaux existant -->
  

    <!-- DEBUT include la Footer -->
    
    <?php include "../partials/Footer.php"?>

    <!-- FIN include la Footer -->