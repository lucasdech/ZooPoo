<?php

require "../setting/autoLoader.php";
require "../setting/db.php";

$addEnclos = new EnclosManager($connexion);
$enclos = new Enclos($_POST);
$addEnclos->addEnclos($enclos);


header("Location: ../pages/GestionEnclos.php?success=Enclos bien ajouté !");
