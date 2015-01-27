<?php

require_once('Kitten.php');

class Kittens_Creator {
    
    private $kittens;
    
    public function create_kittens($amount)
    {
        $this->kittens = array();
        for ($i=0; $i<$amount; $i++)
        {
            $this->kittens[$i] = new Kitten();
        }
    }
    
    public function make_happy()
    {
        foreach ($this->kittens as $kitten)
        {
            $kitten->isHappy = true;
        }
    }
    
    public function get_kittens_array()
    {
        return $this->kittens;
    }
}

?>