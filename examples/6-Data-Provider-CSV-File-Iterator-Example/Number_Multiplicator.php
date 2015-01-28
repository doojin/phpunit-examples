<?php

class Number_Multiplicator
{
    private $numbers = array();
    
    public function add_number($number)
    {
        $this->numbers[] = $number;
    }
    
    public function multiplicate()
    {
        $result = 1;
        foreach ($this->numbers as $number)
        {
            $result *= $number;
        }
        return $result;
    }
}

?>