<?php

require "../setting/autoLoader.php";
require "../setting/db.php";

$Newanimal = new AnimauxManager($connexion);
$animal = new Animaux($_POST);
$Newanimal->addAnimals($animal);

header("Location: ../pages/GestionAnimaux.php?success=Animal bien ajouté !");
