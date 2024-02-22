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
           $prepareSQL = $this->connexion->prepare(
            "SELECT enclos.id, enclos.name, enclos.isclean, enclos.type, COUNT(animaux.id) as nbr_animal 
                FROM enclos 
            LEFT JOIN animaux 
                ON animaux.enclos = enclos.id 
            GROUP BY enclos.id;"
            );
           $prepareSQL->execute();

           $listEnclos = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);

           $enclosArray = [];

           foreach ($listEnclos as $key) {
               $enclos = new Enclos($key);
               array_push($enclosArray, $enclos);
           }

           return $enclosArray;
        }

        public function getById($id)
        {
           $prepareSQL = $this->connexion->prepare("SELECT * FROM enclos WHERE id = ?");
           $prepareSQL->execute([$id]);

           $listEnclos = $prepareSQL->fetch(PDO::FETCH_ASSOC);

            $enclos = new Enclos($listEnclos);
            return $enclos;
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

        public function update(Enclos $enclos)
        {
            $prepareSQL = $this->connexion->prepare(
                "UPDATE enclos 
                SET 
                    name= ?, 
                    isclean= ?, 
                    type= ?, 
                    nbr_animal = ?
                WHERE enclos.id= ?"
            );
            $prepareSQL->execute([
                $enclos->getName(),
                $enclos->getIsClean(),
                $enclos->getType(),
                $enclos->countAnimals(),
                $enclos->getId(),

            ]);
        }
        
        public function IscleanRand(Enclos $enclos)
        {
            $rand  = rand(0, 10);
            $prepareSQL = $this->connexion->prepare("UPDATE enclos SET isclean = ? WHERE id = ?");
            $prepareSQL->execute([
                $rand,
                $enclos->getId()
            ]);
        }

        public function CleanEnclos($id)
        {
            $prepareSQL = $this->connexion->prepare("UPDATE enclos SET isclean = ? WHERE id = ?");
            $prepareSQL->execute([
                0,
                $id
            ]);
        }
}