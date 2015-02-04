<?php

require_once('Kitten.php');

class KittensCreator {
    
    private $kittens;

    /**
     * @param int $amount
     */
    public function createKittens($amount)
    {
        $this->kittens = array();
        for ($i=0; $i<$amount; $i++) {
            $this->kittens[$i] = new Kitten();
        }
    }

    public function makeHappy()
    {
        foreach ($this->kittens as $kitten) {
            $kitten->isHappy = true;
        }
    }

    /**
     * @return array
     */
    public function getKittensArray()
    {
        return $this->kittens;
    }
}