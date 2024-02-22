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
                "INSERT INTO animaux(name, espece, faim, fatigue, taille, poids, malade, enclos) VALUE (?,?,?,?,?,?,?,?)"
            );
            $prepareSQL->execute([
                $animal->getName(),
                $animal->getEspece(),
                $animal->getFaim(),
                $animal->getFatigue(),
                $animal->getTaille(),
                $animal->getPoids(),
                $animal->getMalade(),
                $animal->getEnclosId()
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

         public function AnimalByEnclos($enclosId)
         {
            $prepareSQL = $this->connexion->prepare("SELECT * FROM animaux WHERE enclos = ?");
            $prepareSQL->execute([
                $enclosId
            ]);
            $listAnimaux = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);

            $AnimalArray = [];

            foreach ($listAnimaux as $key) {
                $animaux = new Animaux($key);
                array_push($AnimalArray, $animaux);
            }

            return $AnimalArray;
            
        }

        public function AnimalById($id)
        {
            $prepareSQL = $this->connexion->prepare("SELECT * FROM animaux WHERE id = ?");
            $prepareSQL->execute([
                $id
            ]);
            $AnimalArray = $prepareSQL->fetch(PDO::FETCH_ASSOC);
            
            $animal = new Animaux($AnimalArray);
        
            return $animal;
        }

        public function FaimRand(Animaux $animaux)
        {
            
                $rand  = rand(0, 2);
                $prepareSQL = $this->connexion->prepare("UPDATE animaux SET faim = ? WHERE id = ?");
                $prepareSQL->execute([
                    $rand,
                    $animaux->getId()
                ]);
        }

        public function Nourir(Animaux $animaux)
        { 
            $faim = $animaux->getFaim();
            $nourir = $faim - 1;
            
            $prepareSQL = $this->connexion->prepare("UPDATE animaux SET faim = ? WHERE id = ?");
            $prepareSQL->execute([
                $nourir,
                $animaux->getId()
            ]);
        }

        public function DeleteAnimals(Animaux $animal)
        {
            $prepareSQL = $this->connexion->prepare("DELETE FROM animaux WHERE id = ?");
            $prepareSQL->execute([
                $animal->getId()
            ]);
        }

    }