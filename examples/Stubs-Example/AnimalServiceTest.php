<?php

require_once 'AnimalRepository.php';
require_once 'AnimalService.php';

class AnimalServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var AnimalRepository|PHPUnit_Framework_MockObject_MockObject
     */
    private $animalRepository;

    public function setUp()
    {
        $this->animalRepository = $this->getMockBuilder('AnimalRepository')
            ->setMethods(array('getAnimals'))
            ->getMock();
    }

    public function test_ShouldReturnAnimalListByTheirNames()
    {
        $animalService = new AnimalService();
        $animalService->setAnimalRepository($this->animalRepository);
        $this->animalRepository->expects($this->any())
            ->method('getAnimals')
            ->willReturn(array(
                new Animal(1, 'Fedor', 15),
                new Animal(2, 'Bob', 3),
                new Animal(3, 'Fedor', 3)
            ));

        $expected = array(
            new Animal(1, 'Fedor', 15),
            new Animal(3, 'Fedor', 3)
        );

        $fedors = $animalService->getAnimalsByName('Fedor');

        $this->assertEquals($expected, $fedors);
    }
}