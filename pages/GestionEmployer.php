<?php 

require_once "../setting/db.php";
require_once "../setting/autoLoader.php";

?>

<!-- lien vers la feuille se style spécifique a la page --> <link rel="stylesheet" href="../style/gestion_employer.css">


    <!-- DEBUT include la NavBar -->
    
    <?php include "../partials/navBar.php"?>

    <!-- FIN include la NavBar -->


    <!-- DEBUT formulaire pour créer un employé  -->

    <section class="container mt-5">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="texte" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">age</label>
                <input type="number" class="form-control" name="age">
            </div>
            <div class="mb-3">
                <select id="disabledSelect" class="form-select">
                    <option>sexe</option>
                    <option>Homme</option>
                    <option>Femme</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </section>

    <!-- FIN formulaire pour créer un employé  -->



    <!-- DEBUT include la Footer -->
    
    <?php include "../partials/Footer.php"?>

    <!-- FIN include la Footer -->