<?php

class Number_Incrementer_Test_Data implements Iterator
{
    private $position;
    private $test_data = array(
        array(1, 2),
        array(-2, -1),
        array(0, 1),
        array(100, 101),
        array(-10, -9)
    );
    
    public function __construct()
    {
        $this->position = 0;
    }
    
    public function rewind()
    {
        $this->position = 0;
    }
    
    public function current()
    {
        return $this->test_data[$this->position];
    }
    
    public function key()
    {
        return $this->position;
    }
    
    public function next()
    {
        return ++$this->position;
    }
    
    public function valid()
    {
        return isset($this->test_data[$this->position]);
    }
}

?>