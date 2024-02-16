<?php

require "../setting/autoLoader.php";
require "../setting/db.php";

    $Newanimal = new AnimauxManager($connexion);
    $animal = new Animaux($_POST);
    $Newanimal->addAnimals($animal);

         // test

    $LoadEnclos = new EnclosManager($connexion);
    $enclos = $LoadEnclos->getById($_POST ["enclos"]);
    $enclos->addAnimal($animal);

    $LoadEnclos->update($enclos);
   

header("Location: ../pages/GestionAnimaux.php?success=Animal bien ajouté !");
