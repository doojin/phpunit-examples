<?php

class User
{
    public $username;
    public $password;
    public $isActive;

    /**
     * @param string $username
     * @param string $password
     * @param bool $isActive
     */
    function __construct($username, $password, $isActive = false)
    {
        $this->username = $username;
        $this->password = $password;
        $this->isActive = $isActive;
    }
}