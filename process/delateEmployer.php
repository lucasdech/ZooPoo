<?php

require "../setting/autoLoader.php";
require "../setting/db.php";


$id = $_GET['Employer_id'];


$employerManager = new EmployerManager($connexion);
$employerArray = $employerManager->getAll();

$employer = $employerManager->getById($id);


$employerManager->Delete($employer);

session_destroy();


header("Location: ../pages/GestionEmployer.php?success=Employer bien Viré !");