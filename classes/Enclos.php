<?php

class Enclos {

    private int $id;
    private string $name;
    private int $isClean;
    private string $type;
    private int $nbrAnimal = 0;
    private array $animalArray = [];

    // construct avec hydrate gros

    public function __construct(array $enclos)
    {
        $this->hydrate($enclos);
    }

    // methode hydrate 

    public function hydrate(array $enclos)
    {
        foreach ($enclos as $key => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $method;
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

    public function getIsClean()
    {
        return $this->isClean;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getNbrAnimal()
    {
        return $this->nbrAnimal;
    }

    public function getAnimalArray()
    {
        return $this->animalArray;
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

    public function setIsClean($isClean)
    {
        $this->isClean = $isClean;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setNbrAnimal($nbrAnimal)
    {
        $this->nbrAnimal = $nbrAnimal;
    }

    public function setAnimalArray($animalArray)
    {
        $this->animalArray = $animalArray;
    }


    // autre méthodes 

    // push les enclos dans le tableau d'enclos pour hydrate je pense // NON  

    public function addAnimal(Animaux $animal)
    {
        array_push($this->animalArray, $animal);
    }


}
