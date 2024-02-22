<?php
require_once "./setting/db.php";
require_once "./setting/autoLoader.php";

?>


    <!-- DEBUT include la NavBar -->
    
<?php include "./partials/navBar.php"?>

    <!-- FIN include la NavBar -->


    <!-- DEBUT section présentation avec logo etc... -->


    <section id="presentation" class=" container d-flex align-items-center text-center justify-content-center">
        <div>
            <h1 class="titre text-center">SALUT LE ZOO</h1>
                <p class="fs-3 ">Découvrez un monde sauvage et fascinant !</p>
        </div>
    </section>

    <!-- FIN section présentation avec logo etc... -->



    <!-- DEBUT section navigation dans le site avec animaux ou enclos -->

    <section id="choose" class="d-flex justify-content-around mt-5">
        
        <div id="allEnclos" class="d-flex justify-content-center align-items-center">
            <h1 class="text-white">Enclos</h1>
            <a class="btn btn-outline-light" href="./process/randomIscleanEnclos.php">Enclos</a>
        </div>

        <div id="allAnimal" class="d-flex justify-content-center align-items-center">
            <h1 class="text-white">Animaux</h1>
            <a class="btn btn-outline-light" href="./pages/GestionAnimaux.php">Animaux</a></button>        
        </div>
        
    </section>

    <!-- FIN section navigation dans le site avec animaux ou enclos -->



    <!-- DEBUT section pour gerer les employée -->

    <section class="d-flex justify-content-center">
        <div class="employe d-flex justify-content-center align-items-center">
            <h2>Afficher les employés</h2>
            <a class="btn btn-outline-light" href="./pages/GestionEmployer.php">Employer</a>
        </div>
    </section>

    <!-- FIN section pour gerer les employée -->



    <!-- DEBUT include la Footer -->
    
<?php include "./partials/Footer.php"?>

    <!-- FIN include la Footer -->