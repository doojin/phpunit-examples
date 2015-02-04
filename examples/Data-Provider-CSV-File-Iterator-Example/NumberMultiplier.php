<?php

class NumberMultiplier
{
    private $numbers = array();

    /**
     * @param int|float $number
     */
    public function addNumber($number)
    {
        $this->numbers[] = $number;
    }

    /**
     * @return int
     */
    public function multiply()
    {
        $result = 1;
        foreach ($this->numbers as $number) {
            $result *= $number;
        }
        return $result;
    }
}