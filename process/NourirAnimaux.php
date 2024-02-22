<?php 

require "../setting/autoLoader.php";
require "../setting/db.php";


$id = $_GET['IdAnimal'];

$animauxManager = new AnimauxManager($connexion);
$animal = $animauxManager->AnimalById($id);

$employerManager = new EmployerManager($connexion);
$employer = $employerManager->getById($_SESSION["employer"]->getId());

if ($animal->getFaim() == 0) {

    $employerManager->RemoveFormeAndGolg($employer);
    header('Location:' . $_SERVER['HTTP_REFERER'] . '&error=L\'animal n\'a pas faim ! Arrete !');

}elseif ($animal->getFaim() != 0 ) {
    
    $employerManager->RemoveFormeAndGolg($employer);
    $animauxManager->Nourir($animal);
    
    header('Location:' . $_SERVER['HTTP_REFERER'] . '&success=L\'animal a bien été nourri ! il est content');

}


