<?php

require "../setting/autoLoader.php";
require "../setting/db.php";

if (!empty($_POST['name'])
    && !empty($_POST['age'])
    && !empty($_POST['sexe'])) {
    
        
    $addEmployer = new EmployerManager($connexion);
    $Employer = new Employer($_POST);
    $addEmployer->addEmployer($Employer);
        
    header("Location: ../pages/GestionEmployer.php?success=Employer bien ajouté !");
}else {

    header("Location: ../pages/GestionEmployer.php?error=Veuillez remplir tout les champs !");
}