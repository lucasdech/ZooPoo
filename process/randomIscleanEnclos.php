<?php

require "../setting/autoLoader.php";
require "../setting/db.php";

$enclosManager = new EnclosManager($connexion);

$allenclos = $enclosManager->getAll();

foreach ($allenclos as $enclos) {
    $enclosManager->IscleanRand($enclos);
}


header("Location: ../pages/GestionEnclos.php");
