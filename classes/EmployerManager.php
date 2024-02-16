<?php

    class EmployerManager {
        
        private $connexion;

        public function __construct($connexion)
        {
            $this->connexion = $connexion;
        }

            // a modifier pour les employés

        public function addEnclos(Enclos $enclos)
        {
            $prepareSQL = $this->connexion->prepare(
                "INSERT INTO enclos(name, isclean, type, nbr_animal) VALUE (?, ?, ?, ?)"
            );
            $prepareSQL->execute([
                $enclos->getName(),
                $enclos->getIsClean(),
                $enclos->getType(),
                $enclos->getNbrAnimal(),
            ]);


        }

    }