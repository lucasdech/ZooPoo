<?php

class Animaux {

    private int $id;
    private string $name;
    private string $espece;
    private int $faim;
    private int $fatigue;
    private int $poids;
    private bool $malade = 0;
    private int $enclos;
    private array $animals = [];

    public function __construct(array $animals)
    {
        $this->hydrate($animals);
    }

       // setter 
    // essaie de la fonction hydrater
    
    public function hydrate(array $animals)
    {
        foreach ($animals as $key => $value) {
            $method = 'set' . $key;
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $method;
    }



    public function info()
    {
        echo $this->name . " " . $this->espece . " " . $this->faim . " " . $this->fatigue . " " . $this->poids. " " . $this->enclos;
    }


    // getter

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEspece()
    {
        return $this->espece;
    }

    public function getFaim()
    {
        return $this->faim;
    }

    public function getFatigue()
    {
        return $this->fatigue;
    }

    public function getPoids()
    {
        return $this->poids;
    }

    public function getMalade()
    {
        return $this->malade;
    }

    public function getEnclos()
    {
        return $this->enclos;
    }

    public function addAnimals(Animaux $animals, $method)
    {
       array_push($this->animals, $method);
    }

}


