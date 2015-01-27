<?php

class String_Concatenator
{
    private $strings = array();
    
    public function add_string($string)
    {
        $this->strings[] = $string;
    }
    
    public function merge()
    {
        return implode('', $this->strings);
    }
}

?>