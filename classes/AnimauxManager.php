<?php

    class AnimauxManager {

        private $connexion;

        public function __construct($connexion)
        {
            $this->connexion = $connexion;
        }


        public function addAnimals()
        {
            $prepareSQL = $this->connexion->prepare(
                "INSERT INTO animaux(name, espece, faim, fatigue, taille, poids, malade) VALUE (?,?,?,?,?,?,?)"
            );
            $prepareSQL->execute([
                $_POST['name'],
                $_POST['type_off'],
                $_POST['faim'],
                $_POST['fatigue'],
                $_POST['poids'],
                $_POST['taille'],
                $_POST['malade'],
                // $_POST['enclos'],
            ]);

            header("Location: ../pages/GestionAnimaux.php?sucess=Animal bien ajouté !");
        }

         public function loadAnimals()
         {
            $choice = isset($_POST['choice']) ? $_POST['choice'] : null;

            $prepareSQL = $this->connexion->prepare("SELECT * FROM animaux WHERE espece = ?");
            $prepareSQL->execute([
                $choice
             ]);

         }
    }