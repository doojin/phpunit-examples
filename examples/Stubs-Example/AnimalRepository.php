<?php

require_once 'Animal.php';

class AnimalRepository
{
    /**
     * @var Animal[]
     */
    private $animals;

    public function init()
    {
        $this->animals[] = new Animal(1, 'Garfield', 3);
        $this->animals[] = new Animal(2, 'Jimbo', 4);
        $this->animals[] = new Animal(3, 'Lucky', 1);
    }

    /**
     * @return Animal[]
     */
    public function getAnimals()
    {
        return $this->animals;
    }
}