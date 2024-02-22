<?php 

require "../setting/autoLoader.php";
require "../setting/db.php";

$id_Enclos = $_GET['idEnclos'];

    $AnimalManager = new AnimauxManager($connexion);
    $animaux = $AnimalManager->AnimalByEnclos($id_Enclos);


    foreach ($animaux as $animal) {
      
        $AnimalManager->FaimRand($animal);
    }
    

header("Location: ../pages/detialEnclos.php?idEnclos=" . $id_Enclos. "");