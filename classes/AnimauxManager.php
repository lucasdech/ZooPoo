<?php

    class AnimauxManager {

        private $connexion;

        public function __construct($connexion)
        {
            $this->connexion = $connexion;
        }


        public function addAnimals(Animaux $animal)
        {
            $prepareSQL = $this->connexion->prepare(
                "INSERT INTO animaux(name, espece, faim, fatigue, taille, poids, malade) VALUE (?,?,?,?,?,?,?)"
            );
            $prepareSQL->execute([
                $animal->getName(),
                $animal->getEspece(),
                $animal->getFaim(),
                $animal->getFatigue(),
                $animal->getTaille(),
                $animal->getPoids(),
                $animal->getMalade()
            ]);

        }

        public function loadAll()
        {
           $prepareSQL = $this->connexion->prepare("SELECT * FROM animaux");
           $prepareSQL->execute();

           $listAnimaux = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);

           $AnimalArray = [];

           foreach ($listAnimaux as $key) {
               $animaux = new Animaux($key);
               array_push($AnimalArray, $animaux);
           }

           return $AnimalArray;
        }

         public function loadAnimals($choice)
         {
            $prepareSQL = $this->connexion->prepare("SELECT * FROM animaux WHERE espece = ?");
            $prepareSQL->execute([
                $choice
             ]);

            $listAnimaux = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);

            $AnimalArray = [];

            foreach ($listAnimaux as $key) {
                $animaux = new Animaux($key);
                array_push($AnimalArray, $animaux);
            }

            return $AnimalArray;
         }
    }