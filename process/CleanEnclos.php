<?php

require "../setting/autoLoader.php";
require "../setting/db.php";

$enclos = new EnclosManager($connexion);

$id = $_GET['idEnclos'];
$enclos->getById($id);

$enclos->CleanEnclos($id);


$employer = $_SESSION['employer'];

$employerManager = new EmployerManager($connexion);
$employerManager->RemoveFormeAndGolg($employer);



header("Location: ../pages/detialEnclos.php?idEnclos=". $id ."&success= Enclos bien nettoyé !");