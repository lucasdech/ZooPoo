<?php 

    class EnclosManager {

        private $connexion;

        public function __construct($connexion)
        {
            $this->connexion = $connexion;
        }

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

        public function getAll()
        {
           $prepareSQL = $this->connexion->prepare("SELECT * FROM enclos");
           $prepareSQL->execute();

           $listEnclos = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);

           $enclosArray = [];

           foreach ($listEnclos as $key) {
               $enclos = new Enclos($key);
               array_push($enclosArray, $enclos);
           }

           return $enclosArray;
        }

        public function loadEnclos($choice)
        {
           $prepareSQL = $this->connexion->prepare("SELECT * FROM enclos WHERE type = ?");
           $prepareSQL->execute([
               $choice
            ]);

           $listEnclos = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);

           $enclosArray = [];

           foreach ($listEnclos as $key) {
               $enclos = new Enclos($key);
               array_push($enclosArray, $enclos);
           }

           return $enclosArray;
        }


        


}