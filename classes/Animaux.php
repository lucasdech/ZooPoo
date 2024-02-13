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

    public function __construct(int $id, string $name, string $espece, int $faim, int $fatigue, int $poids, int $enclos)
    {
        $this->id = $id;
        $this->name = $name;
        $this->espece = $espece;
        $this->faim = $faim;
        $this->fatigue = $fatigue;
        $this->poids = $poids ;
        $this->enclos = $enclos;
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


    // setter 
    // essaie de la fonction hydrater
    
    public function hydrate($variable)
    {
        foreach ($variable as $key) {
            $methid = 'set' . $key;
        }
    }


    

}