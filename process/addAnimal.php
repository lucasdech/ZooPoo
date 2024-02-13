<?php

require "../setting/autoLoader.php";
require "../setting/db.php";

$Newanimal = new AnimauxManager($connexion);
$Newanimal->addAnimals();

