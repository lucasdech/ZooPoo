<?php 

?>

    <!-- DEBUT include la NavBar -->
    
<?php include "./partials/navBar.php"?>

    <!-- FIN include la NavBar -->


    <!-- DEBUT section présentation avec logo etc... -->


    <section id="presentation" class=" container d-flex align-items-center justify-content-center">
        <div>
            <h1 class="text-center">SALUT LE ZOO</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque, unde?</p>
        </div>
    </section>

    <!-- FIN section présentation avec logo etc... -->



    <!-- DEBUT section navigation dans le site avec animaux ou enclos -->

    <section id="choose" class="d-flex justify-content-around mt-5">
        
        <div id="allEnclos" class="">
            <h1 class="text-black">Enclos</h1>
            <button type="button" class="btn btn-outline-light"><a href="./pages/enclos.php">Enclos</a></button>
        </div>

        <div id="allAnimal" class="">
            <h1 class="text-black">Animaux</h1>
            <button type="button" class="btn btn-outline-light"> <a href="./pages/animaux.php">Animaux</a></button>        
        </div>
        

    </section>

    <!-- FIN section navigation dans le site avec animaux ou enclos -->



    


    <!-- DEBUT include la Footer -->
    
<?php include "./partials/Footer.php"?>

    <!-- FIN include la Footer -->