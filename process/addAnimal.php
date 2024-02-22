<?php

require "../setting/autoLoader.php";
require "../setting/db.php";

if (!empty($_POST['name'])
    && !empty($_POST['poids'])
    && !empty($_POST['taille'])
    && !empty($_POST['enclos']))
    {
    $Newanimal = new AnimauxManager($connexion);
    $animal = new Animaux($_POST);
    $Newanimal->addAnimals($animal);
    
    // test
    
 

        $LoadEnclos = new EnclosManager($connexion);
        $enclos = $LoadEnclos->getById($_POST ["enclos"]);
        $animals = $Newanimal->AnimalByEnclos($enclos->getId());
        $enclos->setAnimalArray($animals);
        $enclos->addAnimal($animal);
        
        $LoadEnclos->update($enclos);
   
        header("Location: ../pages/GestionAnimaux.php?success=Animal bien ajouté !");

    }else {

        header("Location: ../pages/GestionAnimaux.php?error=Veuillez renseigner tout les champs !");
    }