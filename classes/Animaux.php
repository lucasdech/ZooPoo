<?php

class Animaux {

    private int $id;
    private string $name;
    private string $espece;
    private int $faim;
    private int $fatigue;
    private int $poids;
    private int $taille;
    private bool $malade = false;
    private $enclosId;

    // methode construct avec le hydrate

    public function __construct(array $animals)
    {
        $this->hydrate($animals);
    }

    // essaie de la methode hydrater
    
    public function hydrate(array $animals)
    {
        foreach ($animals as $key => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $method;
    }



    // public function info()
    // {
    //     echo $this->name . " " . $this->espece . " " . $this->faim . " " . $this->fatigue . " " . $this->poids. " " . $this->taille . " " . $this->enclos;
    // }


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

    public function getTaille()
    {
        return $this->taille;
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
        return intval($this->malade);
    }

    public function getEnclosId()
    {
        return $this->enclosId;
    }


    // setter

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEspece($espece)
    {
        $this->espece = $espece;
    }

    public function setTaille($taille)
    {
        $this->taille = $taille;
    }

    public function setFaim($faim)
    {
        $this->faim = $faim;
    }

    public function setFatigue($fatigue)
    {
        $this->fatigue  =$fatigue;
    }

    public function setPoids($poids)
    {
        $this->poids = $poids;
    }

    public function setMalade($malade)
    {
        $this->malade = $malade;
    }

    public function setEnclos($enclosId)
    {
        $this->enclosId = $enclosId;
    }



}


