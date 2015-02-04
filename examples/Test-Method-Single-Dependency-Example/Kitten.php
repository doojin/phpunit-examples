<?php

class Kitten {
    
    public $isHappy = false;
    
    public function __construct($isHappy = false)
    {
        $this->isHappy = $isHappy;
    }
    
}