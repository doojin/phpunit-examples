<?php

class NumberIncrementerTestData implements Iterator
{
    private $position;

    private $testData = array(
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

    /**
     * @return string
     */
    public function current()
    {
        return $this->testData[$this->position];
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @return int
     */
    public function next()
    {
        return ++$this->position;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->testData[$this->position]);
    }
}

?>