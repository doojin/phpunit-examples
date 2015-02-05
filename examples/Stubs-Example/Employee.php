<?php

class Employee
{
    /**
     * @static
     * @var int
     */
    private static $idCounter = 1;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param int $id
     */
    function __construct($firstName, $lastName, $id = null)
    {
        $this->id = $id !== null ? $id : self::$idCounter++;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}