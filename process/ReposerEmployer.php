<?php

require "../setting/autoLoader.php";
require "../setting/db.php";


$employer = $_SESSION['employer'];

$employerManager = new EmployerManager($connexion);
$employerManager->seReposer($employer);

header("Location: ../pages/GestionEmployer.php?success= L'Employer s'est bien reposé !");