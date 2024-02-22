<?php 

class Employer {

    private $id;
    private $name;
    private $age;
    private $sexe;
    private $gold;
    private $forme;

    // construct avec hydrate

    public function __construct(array $employer) 
    {
        $this->hydrate($employer);
    }

    // methode hydrate 

    public function hydrate(array $employer)
    {
        foreach ($employer as $key => $value) {
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

    public function getAge()
    {
        return $this->age;
    }
    
    public function getSexe()
    {
        return $this->sexe;
    }

    public function getGold()
    {
        return $this->gold;
    }

    public function getForme()
    {
        return $this->forme;
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

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    public function setGold($gold)
    {
        $this->gold = $gold;
    }

    public function setForme($forme)
    {
        $this->forme = $forme;
    }


    // autre methode 

}