<?php

require "../setting/autoLoader.php";
require "../setting/db.php";

$employerManager = new EmployerManager($connexion);
$employer = $employerManager->getById($_GET['Employer_id']);

if (!empty($_GET)) {
    $_SESSION['employer'] = $employer;   
}

header("Location: ../pages/GestionEmployer.php");
