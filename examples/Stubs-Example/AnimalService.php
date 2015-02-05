<?php

require_once 'AnimalRepository.php';

class AnimalService
{
    /**
     * @var AnimalRepository
     */
    private $animalRepository;

    /**
     * @param AnimalRepository $animalRepository
     */
    public function setAnimalRepository($animalRepository)
    {
        $this->animalRepository = $animalRepository;
    }

    /**
     * @param string $name
     * @return Animal[]
     */
    public function getAnimalsByName($name)
    {
        $animals = $this->animalRepository->getAnimals();
        $result = array();
        foreach ($animals as $animal) {
            if ($animal->name == $name) {
                $result[] = $animal;
            }
        }
        return $result;
    }
}