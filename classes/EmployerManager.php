<?php

    class EmployerManager {
        
        private $connexion;

        public function __construct($connexion)
        {
            $this->connexion = $connexion;
        }

            // a modifier pour les employés

        public function addEmployer(Employer $employer)
        {
            $prepareSQL = $this->connexion->prepare(
                "INSERT INTO employer(name, sexe, age, gold, forme) VALUE (?, ?, ?, ?, ?)"
            );
            $prepareSQL->execute([
                $employer->getName(),
                $employer->getSexe(),
                $employer->getAge(),
                $employer->getGold(),
                $employer->getForme()
            ]);
        }

        public function getAll()
        {
            $prepareSQL = $this->connexion->prepare("SELECT * FROM employer");
            $prepareSQL->execute();

            $listeEmployer = $prepareSQL->fetchAll(PDO::FETCH_ASSOC);

            $employerArray = [];

            foreach ($listeEmployer as $key) {
                $employer = new Employer($key);
                array_push($employerArray, $employer);
            }

            return $employerArray;
        }

        public function getById($id)
        {
           $prepareSQL = $this->connexion->prepare("SELECT * FROM employer WHERE id = ?");
           $prepareSQL->execute([$id]);

           $listeEmployer = $prepareSQL->fetch(PDO::FETCH_ASSOC);

            $employer = new Employer($listeEmployer);
            return $employer;
        }

        public function Delete(Employer $employer)
        {
            $prepareSQL = $this->connexion->prepare("DELETE FROM employer WHERE id = ?");
            $prepareSQL->execute([
                $employer->getId()
            ]);
        }

        public function RemoveFormeAndGolg(Employer $employer)
        {
            
            $forme = $employer->getForme();
            $forme--;
            $gold = $employer->getGold();
            $goldAfter = $gold - 10;
            $prepareSQL = $this->connexion->prepare("UPDATE employer SET forme = ?, gold = ? WHERE employer.id = ?");
            $prepareSQL->execute([
                $forme,
                $goldAfter,
                $_SESSION['employer']->getId()
            ]);
            $_SESSION['employer']->setForme($forme);
            $_SESSION['employer']->setGold($goldAfter);
        }

        public function seReposer(Employer $employer)
        {
            $gold = $employer->getGold();
            $goldAfter = $gold + 30;
            $prepareSQL = $this->connexion->prepare('UPDATE employer SET forme = ?, gold = ? WHERE employer.id = ?');
            $prepareSQL->execute([
                10,
                $goldAfter,
                $_SESSION['employer']->getId()
            ]);
            $_SESSION['employer']->setForme(10);
            $_SESSION['employer']->setGold($goldAfter);
        }


    }