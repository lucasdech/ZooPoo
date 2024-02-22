<?php 

require "../setting/autoLoader.php";
require "../setting/db.php";


$id = $_GET['IdAnimal'];

$animauxManager = new AnimauxManager($connexion);
$animal = $animauxManager->AnimalById($id);

$animauxManager->DeleteAnimals($animal);


header('Location:' . $_SERVER['HTTP_REFERER'] . '&success=L\'animal a bien été supprimé');
